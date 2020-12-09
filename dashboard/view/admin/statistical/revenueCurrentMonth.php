<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <title>Document</title>
</head>

<body>


    <div class="right__table">
        <p class="right__tableTitle">Revenue in <script> var d = new Date(); document.write( d.getMonth() ) </script> </p>
        <div class="right__tableWrapper">
            <?PHP
            if (!empty($data)) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Date</th>
                            <th>Total Day</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        $total = 0;
                        foreach ($data as $value) {         ?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td class="date"><?php echo $value->date ?></td>
                                <td class="totalDay"><?php echo $value->totalDay?></td>
                                <?PHP $total += $value->totalDay ?>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total Current Month : <?PHP echo $total ?></td>
                        </tr>
                        
                   <?PHP } else { ?>
                        <h1> Không có số liệu </h1>



                    <?PHP } ?>
                    </tbody>
                </table>
        </div>
    </div>
    </div>
    <canvas id="myChart" width="200" height="200"></canvas>
    <script>
        const totalDay = document.querySelectorAll(".totalDay");
        const dateEl = document.querySelectorAll(".date");
        const list_item = [];
        const date_list = [];
        totalDay.forEach(item => {
            list_item.push(item.innerText)
        })
        dateEl.forEach(item => {
            date_list.push(item.innerText)
        })
    </script>
    <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    // type: 'bar',
    type: "bar",
    data: {
        labels: date_list,
        // labels: ['GIANT DAMIER WAVES DENIM JACKET', 'CLOUD PRINT T-SHIRT', 'TAMBOUR SLIM MONOGRAM', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Bảng Thống Kê Doanh Thu',
            data: list_item,
            // data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                // 'rgba(255, 99, 132, 0.2)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                // 'rgba(255, 99, 132, 1)',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</body>

</html>