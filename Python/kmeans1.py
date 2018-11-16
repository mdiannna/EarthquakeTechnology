from sklearn.cluster import KMeans
from sklearn.metrics import silhouette_score,  silhouette_samples,  adjusted_rand_score
from sklearn.mixture import GaussianMixture
import numpy as np
import matplotlib.pyplot as plt


km = KMeans(n_clusters=4)

A = [];
x1 = [1,1, 2, 1, 1, 1, 1, 1, 1, 3, 4, 5, 6, 2,1,4,4,4]
y1 = [2,1, 1, 3, 1, 1, 0.4, 0.5, 0.4, 2, 1, 4, 4,0,2,4,0, 2]

for i in range(0, len(x1)):
	A.append([x1[i], y1[i]]);


# X = np.array([[1, 2], [1, 4], [1, 0], [4, 2], [4, 4], [4, 0]])
X = np.array(A)



# plt.plot(x1,y1, 'ro')
# plt.ylabel('some numbers')
# plt.show()

print(X)
km.fit(X)

y = km.predict(X)

print("Labels:")
print(y)
print(y.size)

print(km.cluster_centers_)
print(km.inertia_)

sil_score = silhouette_score(X, y)

print(sil_score)

for i in range(0, len(y)):
	# print i
	# print y[i]
	if y[i]==0:
		# print("ro")
		plt.plot(x1[i], y1[i], 'ro')
	elif y[i]==1:
		# print("bo")
		plt.plot(x1[i], y1[i], 'bo')
	elif y[i]==2:
		# print("go")
		plt.plot(x1[i], y1[i], 'go')
	elif y[i]==3:
		# print("yo")
		plt.plot(x1[i], y1[i], 'yo')

	else:
		plt.plot(x1[i], y1[i], 'o')

plt.show()
