
    let inputImg = document.querySelector('#imagefile')
    let image = document.querySelector('#liveImage')
    let changeImage = (e) => {
        let url = URL.createObjectURL(e.target.files[0])
        image.src = url
        console.log(image)
    }
    inputImg.addEventListener('change', changeImage)