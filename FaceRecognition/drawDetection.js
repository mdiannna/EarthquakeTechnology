const detectionsArray = fullFaceDescriptions.map(fd => fd.detection)
faceapi.drawDetection(canvas, detectionsArray, { withScore: true })