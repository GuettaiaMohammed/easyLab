<!DOCTYPE html>
<html>
<head>
	<title>Statistiques des visiteurs</title>
</head>
<body>
    <div id="visitor" style="width: 80%;margin: 0 auto;"></div>
    <?= $lava->render('PieChart', 'Statistique', 'visitor') ?>
</body>
</html>