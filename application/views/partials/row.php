                    <?php if(!empty($posts)) { ?>
						
						<?php foreach($posts as $post): ?>
						
						<div class="row-block" rel="<?php echo $post->id; ?>">
							<div class="row-pic">
								<img src="https://graph.facebook.com/<?php echo $post->fbuser_id; ?>/picture" width="50" height="50" />
							</div>
							<div class="row-text">
								<a href="http://www.facebook.com/profile.php?id=<?php echo $post->fbuser_id; ?>" target="_blank"><?php echo $post->nickname; ?></a>
								<span><?php echo $post->fbuser->name; ?></span>
								<p><?php echo Utility::text2html($post->text); ?></p>
								<span>#<?php echo $post->id; ?> - <?php echo Date::db2date_short($post->created_at); ?></span>
								<span class="pull-right"><?php echo $post->fbuser->city; ?></span>
							</div>
						</div>
						
						<?php endforeach;?>
						
					<?php } else {
						
						//Trigger stop
						Cookie::forever('loadStop', true);
						
					?>
						
						<div class="row-block" rel="0">
							<h6>Non ci sono altri pensieri...</h6>
						</div>
						
					<?php } ?>