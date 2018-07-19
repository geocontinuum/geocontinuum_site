<?php

class DragifyWPBlogLayout extends DragifyWPPageLayout{
	protected function blank_render()
	{
		echo $this->options['content'];
	}
}