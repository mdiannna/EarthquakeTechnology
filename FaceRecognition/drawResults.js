const boxesWithText = results.map((bestMatch, i) => {
	const box = fullFaceDescriptions[i].detection.box
	const text = bestMatch.toString()
	const boxWithText = new faceapi.BoxWithText(box, text)
})

faceapi.drawDetection(canvas, boxesWithText)