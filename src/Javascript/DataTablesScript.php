<?php namespace atsanna\DataTables\Javascript;

use atsanna\DataTables\Settings\Configuration;

/**
 * Class Script
 *
 * @package atsanna\DataTables\Javascript
 */
class DataTablesScript
{

	/**
	 * The list of css libraries
	 *
	 * @var string[]
	 */
	protected $css =
		[
			'//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css',
			'//cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css',
			'//cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css',
		];

	/**
	 * The list of default Javascript libraries
	 *
	 * @var string[]
	 */
	protected $javascript =
		[
			'//code.jquery.com/jquery-3.5.1.js',
			'//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js',
			'//cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js',
			'//cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js',
			'//cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js',
		];


	/**
	 * Return list of libraries
	 *
	 * @param array $css 			Other css libraries to merge
	 * @param array $javascript		Other javascript library to merge
	 * @param false[] $replace		Decide if you wont merge or replace the css or javascript libraries
	 */
	public function getExternalLibraries(array $css = array(), array $javascript = array(), array $replace = ['css'=>false, 'js'=>false] )
	{
		if (isset($replace['css']) && $replace['css'] )
		{
			$this->css = $css;
		}elseif (isset($replace['css']) && !$replace['css'])
		{
			$this->css = array_merge($this->css, $css);
		}else{
			$this->css = array();
		}

		if (isset($replace['js']) && $replace['js'] )
		{
			$this->javascript = $javascript;
		}elseif (isset($replace['js']) && !$replace['js'])
		{
			$this->javascript = array_merge($this->javascript, $javascript);
		}else{
			$this->javascript = array();
		}


		// Preloading content
		foreach ($this->css as $el)
		{
			echo '	<link rel="preload" href="' . $el . '" as="style">' . PHP_EOL;
		}
		foreach ($this->javascript as $el)
		{
			echo '	<link rel="preload" href="' . $el . '" as="script">' . PHP_EOL;
		}

		// Add CSS ang Javascript libraries to page
		foreach ($this->css as $el)
		{
			echo '	<link rel="stylesheet" type="text/css" href="' . $el . '">' . PHP_EOL;
		}
		foreach ($this->javascript as $el){
			echo '	<script src="' . $el . '"></script>' . PHP_EOL;
		}
	}



	/**
	 * Minimize javascript code
	 * https://datayze.com/howto/minify-javascript-with-php
	 *
	 * @param $javascript
	 * @return string|string[]|null
	 */
	public function minimizeJavascript($javascript)
	{
		$javascript = preg_replace(array("/\s+\n/", "/\n\s+/", "/ +/"), array("\n", "\n ", " "), $javascript);

		// condense spaces
		$javascript = preg_replace("/\s*\n\s*/", "\n", $javascript); // spaces around newlines
		$javascript = preg_replace("/\h+/", " ", $javascript); // \h+ horizontal white space
		// remove unnecessary horizontal spaces around non variables (alphanumerics, underscore, dollar sign)
		//$javascript = preg_replace("/\h([^A-Za-z0-9\_\$])/", '$1', $javascript); //Causa problemi con le icone nella tabella dei menu
		$javascript = preg_replace("/([^A-Za-z0-9\_\$])\h/", '$1', $javascript);

		return $javascript;
	}

	/**
	 * Generate $(document).ready(function(){} block and include javascript code
	 * to draggable form modal
	 *
	 * @param $id
	 * @param Configuration $configuration
	 * @return string
	 */
	public function getDocumentReady($id, Configuration $configuration): string
	{

		$result = "
			var " . $id . " = $('#" . $id . "').DataTable({
				'paging': " 		. $configuration->getPaging() . ",
				'pagingType': '" 	. $configuration->getPagingType() . "',
				'ordering': " 		. $configuration->getOrdering() . ",
				'info': " 			. $configuration->getInfo() . ",
				'searching': " 		. $configuration->getSearching() . ",
				'lengthMenu': " 	. $configuration->getLengthMenu() . ",
				'processing': " 	. $configuration->getProcessing() . ",
				'serverSide': " 	. $configuration->getServerSide() . ",
				'autoWidth': " 		. $configuration->getAutoWidth() . ",
				'scrollX': " 		. $configuration->getScrollX() . ",
				";

		if( $configuration->getServerSide() === 'true' )
		{
			//$result .= "'ajax': '" 	. $ajax->getDataSource() . "',";
			$result .="
				'ajax':{
					url: '" 		. $configuration->getDataSource() . "',
					type: 'GET',
				},
			";
		}else{
			$result .= "
			'data': " 	. $configuration->getDataSource() . ",";
		}

		if( count($configuration->getColumns()) > 0 )
		{
			$result .= "
			'columns': [";

				for ($x=0; $x<count($configuration->getColumns()); $x++)
				{
					$column = $configuration->getColumns()[$x];
					dd($column);
					$result .= "
					{ 
					'data': '" . $column->getName() . "',
					'searchable': " . $column->getSearchable() . ",
					'visible': " . $column->getVisible() . ",
					'title': '" . $column->getTitle() . "',
					},";
				}

			$result .= "
			],";
		}

		$result .= "
		});
		";

		/*
		$result .= '
		    // Form Draggabile
            $(".modal-header").on("mousedown", function(mousedownEvt) {
                var $"."draggable = $(this);
                var x = mousedownEvt.pageX - $"."draggable.offset().left,
                    y = mousedownEvt.pageY - $"."draggable.offset().top;
                $("body").on("mousemove.draggable", function(mousemoveEvt) {
                    $"."draggable.closest(".modal-dialog").offset({
                        "left": mousemoveEvt.pageX - x,
                        "top": mousemoveEvt.pageY - y
                    });
                });
                $("body").on("mouseup", function() {
                    $("body").off("mousemove.draggable");
                });
                $"."draggable.closest(".modal").one("bs.modal.hide", function() {
                    $("body").off("mousemove.draggable");
                });
            });
		';*/

		return "
		$(document).ready(function() {
		 		" . $result . "
				} );
		";
	}

	/**
	 * @param string $script
	 * @return string
	 */
	public function getJavascript($script='')
	{
		//$javascript = $this->minimizeJavascript( $this->getDocumentReady($script) );
		$javascript_custom = $this->minimizeJavascript( $script );

		return "<script>" . $javascript_custom . "</script>";

	}

}