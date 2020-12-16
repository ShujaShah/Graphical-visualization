$(document).ready(function(){
    $.ajax({
        url: "http://localhost/ProMajor/php/trygeneral.php",
        method: "GET",
        success: function(data) {
            console.log(data);

////pie
             var len = data.length  ;
            var unreg=100-len;
/////bar1
   var stdname=[];
            var enroll = [];
            var java = [];
            var networking=[];
            var wireless=[];
            var multimedia=[];
            var ai=[];
//             for (i = 0; i < 4; i++) {
//             delete data[i];
// }

            for(var i in data) {
                enroll.push(data[i].std_roll);
                // stdname.push(" name"+ data[i].std_name);
                java.push(data[i].java_at);
                networking.push(data[i].networking_at);
                wireless.push(data[i].wireless_at);
                multimedia.push(data[i].multi_at);
                ai.push(data[i].ai_at);

            }
            ///////////////bar 2
            // var stdname=[];
            // var enroll = [];
            var javam = [];
            var networkingm=[];
            var wirelessm=[];
            var multimediam=[];
            var aim=[];
//          for (i = 0; i < 8; i++) {
//             delete data[i];
// }


            for(var i in data) {
                enroll.push(data[i].std_roll);
                // stdname.push(" name"+ data[i].std_name);
                javam.push(data[i].java_obt);
                networkingm.push(data[i].net_obt);
                wirelessm.push(data[i].wire_obt);
                multimediam.push(data[i].mul_obt);
                aim.push(data[i].ai_obt);

            }
            ////////////////////////////

            var javan=[];
            var net=[];
            var wire=[];
            var mul=[];
            var ain=[];
            for(var i in data) {
                javam.push(data[i].java_comp );
                net.push(data[i].net_comp);
                wire.push(data[i].wire_comp);
                mul.push(data[i].mul_comp);
                ain.push(data[i].ai_comp);
                                            }
                                            // window.alert(java);
                var  javai=100-javan;
                var neti=100-net;
                var wirei=100-wire;
                var muli=100-mul;
                var aii=100-ai;        
                                                       
            //var us="unregistered students : "+unreg;
            ///////////////////////////////
               var ctx01 = $("#pie-chartcanvas-1");///pie
                var ctx02 = $("#pie-chartcanvas-2");///bar1
                var ctx = $("#pie-chartcanvas-3");////bar2
               ///////////////////////////////////////

         

                        // //get the pie chart canvas
                        var ctx1 = $("#pie-chartcanvas-x");
                        var ctx2 = $("#pie-chartcanvas-x1");
                        var ctx3 = $("#pie-chartcanvas-x2");
                        var ctx4 = $("#pie-chartcanvas-x3");
                        var ctx5 = $("#pie-chartcanvas-x4");
                        // var ctx2 = $("#pie-chartcanvas-2");
                        ////pie 1 chart data
                         var data= {
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
                        /////////////////////bar 1 chart data
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
            //////////////////////////bar 2 chart data
            var chartdata2 = {
                labels: enroll,
                datasets : [
                    {
                        
                        label: 'java marks',
                        backgroundColor: 'rgba(255, 0, 0, 1)',
                        borderColor: 'rgba(0, 0, 0, 1)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: javam
                    
                        
                    },
                    {
                        
                        label: 'networking marks',
                        backgroundColor: 'rgba(0, 200, 0, 1)',
                        borderColor: 'rgba(0, 0, 0, 1)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: networkingm
                    
                        
                    },
                    {
                        label: 'wireless marks',
                        backgroundColor: 'rgba(0, 0, 200, 1)',
                        borderColor: 'rgba(0, 0, 0, 1)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: wirelessm
                    },
                    
                    {
                        
                        label: 'multimedia marks',
                        backgroundColor: 'rgba(0, 0, 0, 1)',
                        borderColor: 'rgba(0, 0, 0, 1)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: multimediam
                    
                        
                    },
                    {
                        
                        label: 'ai marks',
                        backgroundColor: 'rgba(128, 0, 128, 1)',
                        borderColor: 'rgba(0, 0, 0, 1)',
                        hoverBackgroundColor: 'rgba(200,200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: aim 
                    
                        
                    }
                ]
            };









   //pie chart 2 data
                        var data1 = {
                           
                            datasets: [
                                {
                                    label: "TeamA Score",
                                    data: [javan,javai],
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

 var data2 = {
                         
                            datasets: [
                                {
                                    label: "TeamA Score",
                                    data: [net,neti],
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


                         var data3 = {
                           
                            datasets: [
                                {
                                    label: "TeamA Score",
                                    data: [wire,wirei],
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
                         var data4 = {
                         
                            datasets: [
                                {
                                    label: "TeamA Score",
                                    data: [mul,muli],
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

                         var data5 = {
                            labels: ["completed","incomplete" ],
                            datasets: [
                                {
                                    label: "TeamA Score",
                                    data: [ain,aii],
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
                            data: data1,
                            options: options
                
                           });
                         var chart2 = new Chart(ctx2, {
                            type: "pie",
                            data: data2,
                            options: options
                
                           });
                          var chart3 = new Chart(ctx3, {
                            type: "pie",
                            data: data3,
                            options: options
                
                           });
                           var chart4 = new Chart(ctx4, {
                            type: "pie",
                            data: data4,
                            options: options
                
                           });
                            var chart5 = new Chart(ctx5, {
                            type: "pie",
                            data: data5,
                            options: options
                
                           });
                            ///////pie1
var chart01 = new Chart(ctx01, {
                            type: "pie",
                            data: data,
                            options: options
                
                           });
/////////////////bar1
  // var ctx2 = $("#pie-chartcanvas-2");

            var barGraph = new Chart(ctx02, {
                type: 'bar',
                data: chartdata
            });
            //////////////////bar2
            var ctx = $("#pie-chartcanvas-3");

            var barGraph2 = new Chart(ctx, {
                type: 'bar',
                data: chartdata2
            });



        },
        error: function(data) {
            console.log(data);
        }
                        //create Chart class object
                       
    });
});