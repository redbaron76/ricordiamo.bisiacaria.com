						<?php if(isset($errors)){
							//print_r($errors);
							if($errors->has('nickname')) $nickname_error = $errors->first('nickname', '<span class="help-block red">:message</span>');
							if($errors->has('text')) $text_error = $errors->first('text', '<span class="help-block red">:message</span>');
							$nickname = Input::old('nickname');
							$text = Input::old('text');
						} else {
							$nickname = '';
							$text = '';
						}?>
						
						<span>Sei loggato come:</span>
						<div class="row-block">
							<div class="row-pic">
								<img src="https://graph.facebook.com/<?php echo $user; ?>/picture" width="50" height="50" />
							</div>
							<div class="row-text">
								<a href="<?php echo $me['link']; ?>"><?php echo $me['name']; ?></a>
								<p><a href="<?php echo $fburl; ?>">esci</a></p>
							</div>
						</div>
						<?php echo Form::open('/','POST',array('class' => 'form-stacked')); ?>
							<?php echo Form::token(); ?>
							<?php echo Form::hidden('fbuser_id', Input::old('fbuser_id', $user)); ?>
							<fieldset>
								<legend>Lascia ora il tuo pensiero</legend>
								<div class="clearfix">
									<div class="input">										
										<?php echo Form::text('nickname', $nickname, array('class' => 'span6', 'placeholder' => 'Che nick avevi in Bisiacaria.com?')); ?>
										<?php if(isset($nickname_error)) echo $nickname_error; ?>
									</div>
								</div>
								<div class="clearfix">								
									<div class="input">
										<?php echo Form::textarea('text', $text, array('class' => 'span6', 'cols' => '50', 'rows' => '8', 'placeholder' => 'Cosa è stata per te Bisiacaria.com?')); ?>
										<?php if(isset($text_error)) echo $text_error; ?>
										<span class="help-block">* Il pensiero non potrà essere successivamente modificato.</span>
										<span class="help-block">** Tutto ciò che non sarà un sincero pensiero su Bisia verrà rimosso.</span>
									</div>
								</div>
							</fieldset>
							<div class="action pull-right">
								<?php echo Form::submit('Invia il tuo pensiero', array('class' => 'btn primary')); ?>
							</div>
						<?php echo Form::close(); ?>