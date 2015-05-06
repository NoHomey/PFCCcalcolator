from threading import Thread
from multiprocessing import Process
import urllib2
import urllib
import socket
def f(n):
	res = urllib2.urlopen("http://46.10.124.81:8080/api/sector/%d/objects" % n)
	edges = []
	for line in res.readlines():
		edges.append(line.strip().split(' '))
	res = urllib2.urlopen("http://46.10.124.81:8080/api/sector/%d/roots" % n)
	roots = []
	for line in res.readlines():
		roots.append(line.strip())	
	cycle = roots
	while (1):
		founds = []
		for edge in edges:
			for elm in cycle:
				if edge[0] == elm: founds.append(edge)	  
		if founds == []: break
		cycle = []
		for found in founds:
			if found in edges: edges.remove(found)
			cycle.append(found[1])
			if found[1] not in roots: roots.append(found[1])
	cycle = []
	nodes = []
	trace = []
	for edge in edges:
		if edge[1] in roots:
			if edge[0] not in nodes: nodes.append(edge[0])
			founds.append(edge)
	for track in founds: edges.remove(track)		
	while (1):
		res = 0;
		for edge in edges:
			if edge[0] != edge[1] and edge[0] not in cycle and edge[1] not in cycle:
				per = edge[1]
				traject = edge[0] + ' ' + per
				cycle.append(edge[0])
				cycle.append(per)
				rm = [edge]
				res = 1
				break
		if res == 0: break
		while (1):
			res = 0
			for edge in edges:
				if edge[0] == per and edge[1] != edge[0] and edge[1] not in cycle:
					per = edge[1] 
					res = 1
					traject += ' ' + edge[1]
					cycle.append(edge[1])
					rm.append(edge)
			if res == 0: break
		trace.append(traject)
		for rem in rm: edges.remove(rem)
	founds = []
	for edge in edges:
		if edge[0] not in founds: founds.append(edge[0])
		if edge[1] not in founds: founds.append(edge[1])
	for i in cycle:
		if i in founds: founds.remove(i)
	for node in nodes:
		if node not in founds : founds.append(node)
	for traject in trace: urllib2.urlopen(urllib2.Request("http://46.10.124.81:8080/api/sector/%d/company/Ivo/trajectory" % n, urllib.urlencode({'trajectory': traject})))
	for left in founds: urllib2.urlopen(urllib2.Request("http://46.10.124.81:8080/api/sector/%d/company/Ivo/trajectory" % n, urllib.urlencode({'trajectory': left})))
	return
def bug(no):
	try: urllib2.urlopen("http://46.10.124.81:8080/api/sector/1/objects", timeout = 10)
	except socket.timeout: urllib2.urlopen("http://46.10.124.81:8080/api/sector/1/objects")
	thrs = []
	for i in range(1, 11): thrs.append(Thread(target=f, args=(i, )))
	for t in thrs: t.start()
	for t in thrs: t.join()
a = 0
p = Process(target=bug, args=(a, ))
p.start()
p.join()