<?php

class DragifyWPSingleLayout extends DragifyWPPageLayout{
	protected function fullwidth_render()
	{
		echo $this->options['content'];
	}
}