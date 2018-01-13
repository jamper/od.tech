<?=doctype('html5');?>
	<head>
		<?$this->load->view('head', $content);?>
	</head>
	<body>
		<div class="wrap">
			<header class="header">
				<ul>
					<li class="active">
						<a href="/index">Personal info</a>
					</li>
					<li>
						<a href="#">Specialization</a>
					</li>
					<li>
						<a href="#">Subscriptions</a>
					</li>
					<li>
						<a href="#">Security</a>
					</li>
				</ul>
			</header>
			<div class="container">
				<section class="data-container"><?$this->load->view($template, $content);?></section>
			</div>
			<div>Script time: <?=$this->benchmark->elapsed_time('code_start', 'code_end');?></div>
			<div>All time: <?=$this->benchmark->elapsed_time();?></div>
			<div>All memory: <?=$this->benchmark->memory_usage();?></div>
		</div>
	</body>
</html>