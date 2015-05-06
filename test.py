import urllib2
import urllib
res = urllib2.urlopen("http://172.16.24.129:8080/api/sector/6/objects")
edges = []
for line in res.readlines():
	edges.append(line.strip().split(' '))
res = urllib2.urlopen("http://172.16.24.129:8080/api/sector/6/roots")
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
	chil = 0;
	for test in edges:
		if test[0] != test[1] and test[0] not in cycle and test[1] not in cycle:
			per = test[1]
			traject = test[0] + ' ' + per
			cycle.append(test[0])
			cycle.append(per)
			rm = [test]
			chil = 1
			break
	if chil == 0: break
	while (1):
		chil = 0
		for edge in edges:
			if edge[0] == per and edge[1] != edge[0] and edge[1] not in cycle:
				per = edge[1] 
				chil = 1
				traject += ' ' + edge[1]
				cycle.append(edge[1])
				rm.append(edge)
		if chil == 0: break
	urllib2.urlopen(urllib2.Request("http://172.16.24.129:8080/api/sector/6/company/Ivo/trajectory", urllib.urlencode({'trajectory': traject})))
	for rem in rm: edges.remove(rem)
founds = []
for edge in edges:
	if edge[0] not in founds: founds.append(edge[0])
	if edge[1] not in founds: founds.append(edge[1])
for i in cycle:
	if i in founds: founds.remove(i)
for node in nodes:
	if node not in founds : founds.append(node)
for left in founds: urllib2.urlopen(urllib2.Request("http://172.16.24.129:8080/api/sector/6/company/Ivo/trajectory", urllib.urlencode({'trajectory': left})))