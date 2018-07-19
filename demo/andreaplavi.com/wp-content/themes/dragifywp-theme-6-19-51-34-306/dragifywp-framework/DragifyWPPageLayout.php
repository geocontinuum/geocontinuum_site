<?php

class DragifyWPPageLayout{
	function __construct(array $options)
	{
		$this->options = $options;

		if(!empty($this->options['content_class'])){
			$this->options['content_class'] = ' '.$this->options['content_class'];
		}else{
			$this->options['content_class'] = '';
		}

		if(!empty($this->options['wrap_class'])){
			$this->options['wrap_class'] = ' '.$this->options['wrap_class'];
		}else{
			$this->options['wrap_class'] = '';
		}

		if(empty($this->options['has_border'])){
			$this->options['has_border'] = false;
		}

	}

	public function render(){
		switch ($this->options['type']) {
			case 'fullwidth':
				$this->fullwidth_render();
				break;
			case 'sidebar-left':
				$this->sidebar_left_render();
				break;
			case 'sidebar-right':
				$this->sidebar_right_render();
				break;
			default:
				$this->blank_render();
				break;
		}
	}

	protected function blank_render(){
		echo '<div class="dragifywp-page'.$this->options['content_class'].'">'.$this->options['content'].'</div>';
	}

	protected function fullwidth_render(){
		?>
		<div class="dragifywp-page dragifywp-page--fullwidth <?php echo $this->options['wrap_class']; ?>">
			<div class="dragifywp-container">
				<div class="dragifywp-row">
					<div class="dragifywp-page__content dragifywp-page__column<?php echo $this->options['content_class']; ?>">
						<?php echo $this->options['content']; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	protected function sidebar_left_render(){
		?>
		<div class="dragifywp-page dragifywp-page--sidebarLeft dragifywp-page--singleSidebar dragifywp-page--hasSidebar<?php echo $this->options['wrap_class']; ?> <?php if ($this->options['has_border']) echo 'dragifywp-page--hasBorder' ?>">
			<div class="dragifywp-container">
				<div class="dragifywp-row">
					<div class="dragifywp-page__content dragifywp-page__column">
						<div class="dragifywp-page__content--paddingLeft<?php echo $this->options['content_class']; ?>"><?php echo $this->options['content']; ?></div>
					</div>
					<div class="dragifywp-page__sidebar dragifywp-page__column">
						<?php if (!empty($this->options['sidebar']) && is_active_sidebar('dragifywp-sidebar-' . $this->options['sidebar'])): ?>
							<aside class="dragifywp-page__sidebar--paddingRight"><?php dynamic_sidebar('dragifywp-sidebar-' . $this->options['sidebar']); ?></aside>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	protected function sidebar_right_render(){
		?>
		<div class="dragifywp-page dragifywp-page--sidebarRight dragifywp-page--singleSidebar dragifywp-page--hasSidebar<?php echo $this->options['wrap_class']; ?> <?php if ($this->options['has_border']) echo 'dragifywp-page--hasBorder' ?>">
			<div class="dragifywp-container">
				<div class="dragifywp-row">
					<div class="dragifywp-page__content dragifywp-page__column">
						<div class="dragifywp-page__content--paddingRight<?php echo $this->options['content_class']; ?>"><?php echo $this->options['content']; ?></div>
					</div>
					<div class="dragifywp-page__sidebar dragifywp-page__column">
						<?php if (!empty($this->options['sidebar']) && is_active_sidebar('dragifywp-sidebar-' . $this->options['sidebar'])): ?>
							<aside class="dragifywp-page__sidebar--paddingLeft"><?php dynamic_sidebar('dragifywp-sidebar-' . $this->options['sidebar']); ?></aside>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}