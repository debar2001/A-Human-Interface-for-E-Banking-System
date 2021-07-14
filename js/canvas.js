const canvas = document.querySelector('canvas')
const c = canvas.getContext('2d')

canvas.width = innerWidth;
canvas.height = innerHeight;

window.addEventListener('resize',function (){                   //event listener so that when window is resized the canvas also resizes
    canvas.width=window.innerWidth;
    canvas.height=window.innerHeight;
    
});

const wave = {
	y: canvas.height/2,
	length: 0.02,
	amplitude: 100, 
	frequency: 0.03
}


const strokeColour = {
	h: 250,
	s: 50,
	l: 50
}


let increment = wave.frequency

function animate()
{
	requestAnimationFrame(animate)
	c.fillStyle = 'rgba(0, 0, 0, 0.05)'
	c.fillRect(0, 0, canvas.width, canvas.height)

	c.beginPath()

    c.moveTo(0,canvas.height / 2)

    for(let i=0; i<canvas.width; i++)
    {
	   c.lineTo(i, wave.y + 
	   	Math.sin(i * wave.length + increment * Math.sin(increment)/15) * 
	   	wave.amplitude * 
	   	Math.sin(increment))
    }
    c.strokeStyle = `hsl(${Math.abs(strokeColour.h * Math.sin(increment))}, ${strokeColour.s}%, ${strokeColour.l}%)`
    c.stroke()
    increment += wave.frequency

}

animate()