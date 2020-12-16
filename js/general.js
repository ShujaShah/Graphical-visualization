$(document).ready(function(){
    $.ajax({
        url: "http://localhost/ProMajor/php/general.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var len = data.length  ;
            var unreg=100-len;
          //  var rs="registered students : "+len;
            //var us="unregistered students : "+unreg;

         

                        // //get the pie chart canvas
                        var ctx1 = $("#pie-chartcanvas-1");
                        // var ctx2 = $("#pie-chartcanvas-2");
                        

                        //pie chart data
                        var data1 = {
                            labels: ["registered students","unregistered students" ],
                            datasets: [
                                {
                                    label: "TeamA Score",
                                    data: [len,unreg],
                                    backgroundColor: [
                                        "#DEB887",
                                        "#A9A9A9",
                                        "#DC143C",
                                        "#F4A460",
                                        "#2E8B57"
                                    ],
                                    borderColor: [
                                        "#CDA776",
                                        "#989898",
                                        "#CB252B",
                                        "#E39371",
                                        "#1D7A46"
                                    ],
                                    borderWidth: [1, 1]
                                }
                            ]
                        };

                        //pie chart data
                        

                        //options
                        var options = {
                            responsive: true,
                            title: {
                                display: true,
                                position: "top",
                                text: "Pie Chart",
                                fontSize: 18,
                                fontColor: "#999"
                            },
                            legend: {
                                display: true,
                                position: "bottom",
                                labels: {
                                    fontColor: "#333",
                                    fontSize: 16
                                }
                            }
                        };

                        //create Chart class object
                        var chart1 = new Chart(ctx1, {
                            type: "pie",
                            data: data,
                            options: options
                
                           });

        },
        ///////
        success: function(data) {
            console.log(data);
            var stdname=[];
            var enroll = [];
            var java = [];
            var networking=[];
            var wireless=[];
            var multimedia=[];
            var ai=[];
            for (i = 0; i < 4; i++) {
            delete data[i];
}

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

            // var ctx = $("#mycanvas");
            var ctx2 = $("#pie-chartcanvas-2");

            var barGraph = new Chart(ctx2, {
                type: 'bar',
                data: chartdata
            });
        },
        ////////////////
        error: function(data) {
            console.log(data);
        }
                        //create Chart class object
                       
    });
});