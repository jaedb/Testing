// JavaScript Document


$(document).ready(function(){
		
	
		
	
	// ========================================================== CSS TRANSITIONS =============== //
	// ========================================================================================== //
	
	
	
	
	
	
	
	// ================================================================== IFRAMES =============== //
	// ========================================================================================== //

	$('div#down').click(function(){
		$('div#one-container ul').animate({ 'marginTop' : '-=50' });
	});
	
	$('div#up').click(function(){
		$('div#one-container ul').animate({ 'marginTop' : '+=50' });
	});
	
	$('#load-iframe').click(function(){
		$('#iframe-container iframe').attr('src', 'http://www.linkedin.com/cws/share');
	});
	
	
	
	
	/* ==================================== SETUP ==== */
	
	var animate = 'load';
		
	var canvas = document.getElementById("my-canvas");
	var context = canvas.getContext("2d");
	var centerX = canvas.width / 2;
	var centerY = canvas.height / 2;
	var radius = 50;		
	var counter = 0;
	var animationLength = 10;
	var animationScale = 1;
	var animationDistance = 1;
	
	// setup everyFrame function
	setInterval(everyFrame, 24);
		
	
	// ================================================================== DRAWING =============== //
	// ========================================================================================== //
	
	function everyFrame(){
	
		if( counter < 0 ){
			counter = 0;
		}
		
		// if we're animating (in OR out)
		if( animate != '' ){
			
			// figure out which way we're animating
			switch( animate ){
				
				// we're animating in
				case 'in' :
					counter++;
					break;
				
				// we're animating out
				case 'out' :
					counter--;
					break;
			}
			
			// if counter has met animationLength OR we've animated back to 0
			if( counter >= animationLength || counter <= 0 ){
				
				// stop animation as we're finished
				animate = '';
			}
			
			
			// ======================================== ANIMATION === //
			
			// setup position for these circles
			animationDistance = animationScale * counter;
			
			// 'clear' the canvas with a blank box
			context.clearRect(0, 0, canvas.width, canvas.height);			
			
			// save the current state (imagine a stacking array)
			context.save();
			
			// turquoise circle
			context.beginPath();
			context.arc( centerX-20+animationDistance, centerY-20+animationDistance, radius, 0, 2 * Math.PI, false);
			context.fillStyle = "#60BDB6";
			context.fill();
			
			// pink circle
			context.beginPath();
			context.arc(centerX+30-animationDistance, centerY+30-animationDistance, radius*1.3, 0, 2 * Math.PI, false);
			context.fillStyle = "#EE2D64";
			context.fill();	
			
			// clipping path for overlap circle
			context.beginPath();
			context.arc(centerX+30-animationDistance, centerY+30-animationDistance, radius*1.15, 0, 2 * Math.PI, false);
			context.clip();
			
			// dark overlap circle
			context.beginPath();
			context.arc(centerX-20+animationDistance, centerY-20+animationDistance, radius, 0, 2 * Math.PI, false);
			context.fillStyle = "#61204d";
			context.fill();
			
			// restore the current state (imagine dropping off the top from the array stack)
			context.restore();
			
			
		}
		
	}
	
	
	
	
	// =================================================================== EVENTS =============== //
	// ========================================================================================== //
	
	
	// listeners
	canvas.addEventListener("mouseenter", mouseEnter, false);
	canvas.addEventListener("mouseleave", mouseLeave, false);

	
	// ==================================== MOUSE OVER === //
	
	function mouseEnter(){
		animate = 'in';
	};
	
	
	// ==================================== MOUSE EXIT === //
	
	function mouseLeave(){
		animate = 'out';
	};
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* ==================================================================================================================================== */
	/* ================================================================================================================ KINETIC =========== */
	/* ==================================================================================================================================== */
	

	function writeMessage(messageLayer, message) {
		var context = messageLayer.getContext();
		messageLayer.clear();
		context.font = '18pt Calibri';
		context.fillStyle = 'black';
		context.fillText(message, 10, 25);
	}

	
	
	/* =========================================================== ENVIRONMENT SETUP ========== */
	/* ======================================================================================== */
	
	// create a stage
	var stage = new Kinetic.Stage({
		container: 'container',
		width: 500,
		height: 200
	});
	
	// create a layer for each set of objects
	var shapesLayer = new Kinetic.Layer();
	var messageLayer = new Kinetic.Layer();
	
	
	
	/* ============================================================== CREATE OBJECTS ========== */
	/* ======================================================================================== */
	
	// create pink circle
	var circlePink = new Kinetic.Circle({
		x: 310,
		y: 110,
		radius: 65,
		fill: '#ee2d64',
		opacity: 0.85
	});
	
	// create pink edge
	var circlePinkEdge = new Kinetic.Circle({
		x: 310,
		y: 110,
		radius: 62,
		stroke: '#ee2d64',
		strokeWidth: 12
	});
	
	// create turq circle
	var circleTurquoise = new Kinetic.Circle({
		x: 250,
		y: 70,
		radius: 50,
		fill: '#60BDB6',
		opacity: 0.8
	});
	
	
	
	/* ============================================================= EVENT LISTENERS ========== */
	/* ======================================================================================== */
	
	var animationSpeed = 0.15;
	
	
	/* ========================== MOUSE OVER === */
	
	shapesLayer.on('mouseover', function() {
		
		circlePink.transitionTo({
			x: 305,
			y: 105,
			duration: animationSpeed,
		});
		
		circlePinkEdge.transitionTo({
			x: 305,
			y: 105,
			duration: animationSpeed,
		});
		
		circleTurquoise.transitionTo({
			x: 255,
			y: 75,
			duration: animationSpeed,
		});
		
	});	
	
	
	/* ========================== MOUSE OUT === */
	
	shapesLayer.on('mouseout', function() {
		
		circlePink.transitionTo({
			x: 310,
			y: 110,
			duration: animationSpeed,
		});
		
		circlePinkEdge.transitionTo({
			x: 310,
			y: 110,
			duration: animationSpeed,
		});
		
		circleTurquoise.transitionTo({
			x: 250,
			y: 70,
			duration: animationSpeed,
		});
				
	});
	
	
	
	/* ================================================================ ADD TO STAGE ========== */
	/* ======================================================================================== */
	
	
	// add objects to layer
	shapesLayer.add(circlePink);
	shapesLayer.add(circleTurquoise);
	shapesLayer.add(circlePink);
	shapesLayer.add(circlePinkEdge);
	
	// add layers to stage
	stage.add(shapesLayer);
	stage.add(messageLayer);	
	
});