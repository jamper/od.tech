<form method="post" action="/results">
	<aside class="form-data">
			<div>
				<label for="name">Имя пользователя</label>
				<input type="text" name="name" id="name" placeholder="Имя пользователя" />
			</div>
			<div>
				<label for="surname">Фамилия пользователя</label>
				<input type="text" name="surname" id="surname" placeholder="Фамилия пользователя" />
			</div>
			<div>
				<label for="name">Емейл пользователя</label>
				<input type="email" name="email" placeholder="Имя пользователя" />
			</div>
			<div>
				<label for="category">Категория</label>
				<?if(!empty($categories)):?>
				<?foreach($categories as $category):?>
				<div>
					<label for="category[]"><?=$category->charity_text;?></label>
					<input type="checkbox" name="category[]" value="<?=$category->charity_id;?>" />
				</div>
				<?endforeach;?>
				<?endif;?>
			</div>
			<div>
				<input type="submit" value="Сохранить" />
			</div>
	</aside>
	<aside class="avatar">
		<img src="https://www.shareicon.net/data/128x128/2015/09/24/106425_man_512x512.png" alt="" title="" />
		
		<input type="range" name="range" id="range" min="0" max="50" step="5" value="0" />
	</aside>
</form>