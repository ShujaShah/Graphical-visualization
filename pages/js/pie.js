$(document).ready(function(){
    $.ajax({
        url: "http://localhost/ProMajor/php/piedata.php",
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
                            data: data1,
                            options: options
                
                           });

        },
        error: function(data) {
            console.log(data);
        }
                        //create Chart class object
                       
    });
});