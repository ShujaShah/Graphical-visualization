$(document).ready(function(){
    $.ajax({
        url: "http://localhost/ProMajor/php/general4.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var java=[];
            var net=[];
            var wire=[];
            var mul=[];
            var ai=[];
            for(var i in data) {
                java.push(data[i].java_comp );
                net.push(data[i].net_comp);
                wire.push(data[i].wire_comp);
                mul.push(data[i].mul_comp);
                ai.push(data[i].ai_comp);
                                            }
                                            // window.alert(java);
                var  javai=100-java;
                var neti=100-net;
                var wirei=100-wire;
                var muli=100-mul;
                var aii=100-ai;        
                                                       
            //var us="unregistered students : "+unreg;

         

                        // //get the pie chart canvas
                        var ctx1 = $("#pie-chartcanvas-x");
                        var ctx2 = $("#pie-chartcanvas-x1");
                        var ctx3 = $("#pie-chartcanvas-x2");
                        var ctx4 = $("#pie-chartcanvas-x3");
                        var ctx5 = $("#pie-chartcanvas-x4");
                        // var ctx2 = $("#pie-chartcanvas-2");

                        //pie chart data
                        var data1 = {
                           
                            datasets: [
                                {
                                    label: "TeamA Score",
                                    data: [java,javai],
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
                                    data: [ai,aii],
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

        },
        error: function(data) {
            console.log(data);
        }
                        //create Chart class object
                       
    });
});