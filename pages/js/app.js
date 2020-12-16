
$(document).ready(function(){
	$.ajax({
		url: "http://localhost/ProMajor/php/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var stdname=[];
			var enroll = [];
			var java = [];
			var networking=[];
			var wireless=[];
			var multimedia=[];
			var ai=[];


			for(var i in data) {
				enroll.push(data[i].std_roll);
				// stdname.push(" name"+ data[i].std_name);
				java.push(data[i].java_at);
				networking.push(data[i].networking_at);
				wireless.push(data[i].wireless_at);
				multimedia.push(data[i].multi_at);
				ai.push(data[i].ai_at);

			}

			var chartdata = {
				labels: enroll,
				datasets : [
					{
						
						label: 'java attendence',
						backgroundColor: 'rgba(255, 0, 0, 1)',
						borderColor: 'rgba(0, 0, 0, 1)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: java
					
						
					},
					{
						
						label: 'networking attendence',
						backgroundColor: 'rgba(0, 200, 0, 1)',
						borderColor: 'rgba(0, 0, 0, 1)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: networking
					
						
					},
					{
						label: 'wireless attendence',
						backgroundColor: 'rgba(0, 0, 200, 1)',
						borderColor: 'rgba(0, 0, 0, 1)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: wireless
					},
					
					{
						
						label: 'multimedia attendence',
						backgroundColor: 'rgba(0, 0, 0, 1)',
						borderColor: 'rgba(0, 0, 0, 1)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: multimedia
					
						
					},
					{
						
						label: 'ai attendence',
						backgroundColor: 'rgba(128, 0, 128, 1)',
						borderColor: 'rgba(0, 0, 0, 1)',
						hoverBackgroundColor: 'rgba(200,200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: ai
					
						
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});