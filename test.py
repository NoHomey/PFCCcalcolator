import urllib2
import urllib
res = urllib2.urlopen("http://172.16.24.129:8080/api/sector/2/objects")
edges = []
for line in res.readlines():
	edges.append(line.strip().split(' '))
res = urllib2.urlopen("http://172.16.24.129:8080/api/sector/2/roots")
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
	urllib2.urlopen(urllib2.Request("http://172.16.24.129:8080/api/sector/2/company/Ivo/trajectory", urllib.urlencode({'trajectory': traject})))
	for rem in rm: edges.remove(rem)
founds = []
for edge in edges:
	if edge[0] not in founds: founds.append(edge[0])
	if edge[1] not in founds: founds.append(edge[1])
for i in cycle:
	if i in founds: founds.remove(i)
for node in nodes:
	if node not in founds : founds.append(node)
for left in founds: urllib2.urlopen(urllib2.Request("http://172.16.24.129:8080/api/sector/2/company/Ivo/trajectory", urllib.urlencode({'trajectory': left})))