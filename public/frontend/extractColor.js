const extractColor = {
    getImageColor(image) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        canvas.width = image.width;
        canvas.height = image.height;
        ctx.drawImage(image, 0, 0);
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        let r = 0, g = 0, b = 0;
        for (let i = 0; i < imageData.data.length; i += 4) {
            r += imageData.data[ i ];
            g += imageData.data[ i + 1 ];
            b += imageData.data[ i + 2 ];
        }
        const numPixels = imageData.data.length / 4;
        r = Math.round(r / numPixels);
        g = Math.round(g / numPixels);
        b = Math.round(b / numPixels);
        return `rgb(${r}, ${g}, ${b})`;
    },
    getContrastColor(hexColor) {
        const threshold = 130;
        const r = parseInt(hexColor.substr(1, 2), 16);
        const g = parseInt(hexColor.substr(3, 2), 16);
        const b = parseInt(hexColor.substr(5, 2), 16);
        const yiq = ((r * 299) + (g * 587) + (b * 114)) / 1000;
        return (yiq >= threshold) ? '#000000' : '#ffffff';
    }
}