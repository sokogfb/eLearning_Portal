<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('teacher_sidebar.php'); ?>
			<div class="span6" id="content">
				<div class="row-fluid">
					
					<ul class="breadcrumb">
						<li><a href="#"><b>Profile</b></a></li>
					</ul>
					
					<!-- block -->
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-left"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<div class="alert alert-info"><i class="icon-info-sign"></i> About me</div>
								<p>Dr. Albana Gorishti ka një diplomë Bachelor si Matematiciene nga Universiteti i Tiranës, Fakulteti i Shkencave të Natyrës (1996). Ajo mban një diplomë Master në “Matematikë e Aplikuar” pranë Universitetit Politeknik të Tiranës (2008).

									Albana Gorishti mban titullin Doktor në fushën “Teknologjia e Informacionit” nga Universiteti i Tiranës, të mbrojtur me një disertacion mbi përdorimin e aplikimeve Open Source dhe zhvillimin e ERP-ve për SME.

									Ajo ka një përvojë intensive në fushën e IT pasi është përfshirë në projekte të ndryshme në fushën e Teknologjisë së Informacionit dhe ka punuar si kërkuese shkencore, menaxhere projektesh, instruktore IT Cisco, administratore e APTC, programuese dhe dizajner sistemi. Znj. Albana Gorishti ka eksperiencë pune në institucione të tilla si Kontrolli i Lartë i Shtetit, Cacttus sh.a., INIMA- Akademia e Shencave, etj. Ajo jep mësim në auditor që nga vitit 2000, aktualisht punon si pedagoge e brendshme që nga viti 2009.

									Ajo ka prezantuar punën e saj shkencore në konferenca të shumta kombëtare dhe ndërkombëtare si dhe ka botuar punime në disa revista shkencore.</p>
								<?php $query = mysqli_query($link, "select * from teacher where teacher_id = '$session_id'") or die(mysqli_error($link));
								$row = mysqli_fetch_array($query);
								?>
								<?php echo $row['about']; ?>

							</div>
						</div>
					</div>
					<!-- /block -->
				</div>
			</div>
			<?php include('teacher_right_sidebar.php') ?>
		</div>
	</div>
	<?php include('script.php'); ?>
</body>

</html>