import urllib2
import urllib
def find(sector):
	res=urllib2.urlopen("http://172.16.24.129:8080/api/sector/%d/objects" % sector)
	edges = []
	for line in res.readlines():
		edges.append([int(s) for s in line.strip().split(' ')])
	res=urllib2.urlopen("http:/172.16.24.129:8080/api/sector/%d/roots" % sector)
	roots = []
	for line in res.readlines():
		roots.append(int(line.strip()))	
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
	for edge in edges:
		if edge[0] not in founds: founds.append(edge[0])
		if edge[1] not in founds: founds.append(edge[1])
	for i in roots:
		if i in founds: founds.remove(i)
		
	return founds

def thread():
	ivo = find(8)
	print len(ivo)
	print ivo

thread()