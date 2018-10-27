// // get images from the folder
// const MODEL_URL = '/models'
// await faceapi.loadSsdMobilenetv1Model(MODEL_URL)
// await faceapi.loadFaceLandmarkModel(MODEL_URL)
// await faceapi.loadFaceRecognitionModel(MODEL_URL)

// // get infos about an input image
const input = document.getElementById('myImage')
let fullFaceDescriptions = await faceapi.detectAllFaces(input)

// // put some labels on images/faces
// const labels = ['image_1', 'image_2', 'image_3', 'image_4']

// const labeledFaceDescriptors = await Promise.all(
// 	labels.map(async label => {
// 		const imgUrl = '${label}.png'
// 		const img = await faceapi.fetchImage(imgUrl)

// 		const fullFaceDescription = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()

// 		if(!fullFaceDescription) {
// 			throw new Error('No faces detected for ${label}')
// 		}

// 		const faceDescriptors = [fullFaceDescription.descriptor]
// 		return new faceapi.LabeledFaceDescriptors(label, faceDescriptors)
// 	})
// )

// // draw some rectangles and some infos around the faces
// const boxesWithText = results.map((bestMatch, i) => {
// 	const box = fullFaceDescriptions[i].detection.box
// 	const text = bestMatch.toString()
// 	const boxWithText = new faceapi.BoxWithText(box, text)
// })

// faceapi.drawDetection(canvas, boxesWithText)

// // draw only rectangle of detected faces
// const detectionsArray = fullFaceDescriptions.map(fd => fd.detection)
// faceapi.drawDetection(canvas, detectionsArray, { withScore: true })

// // recognition
// const maxDescriptorDistance = 0.6
// const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, maxDescriptorDistance)

// const results = fullFaceDescriptions.map(fd => faceMatcher.findBestMatch(fd.descriptor))