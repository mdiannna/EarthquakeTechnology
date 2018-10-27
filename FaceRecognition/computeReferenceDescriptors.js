const labels = ['image_1', 'image_2', 'image_3', 'image_4']

const labeledFaceDescriptors = await Promise.all(
	labels.map(async label => {
		const imgUrl = '${label}.png'
		const img = await faceapi.fetchImage(imgUrl)

		const fullFaceDescription = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()

		if(!fullFaceDescription) {
			throw new Error('No faces detected for ${label}')
		}

		const faceDescriptors = [fullFaceDescription.descriptor]
		return new faceapi.LabeledFaceDescriptors(label, faceDescriptors)
	})
)