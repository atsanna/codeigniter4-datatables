<?php

/**
 * This file is part of DataTables.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\DataTables\Javascript;

use atsanna\DataTables\Settings\Configuration;

/**
 * Class Script
 */
class DataTablesScript
{
    /**
     * The list of css libraries
     *
     * @var string[]
     */
    protected $css = [
        '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.css',
        '//cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css',
        '//cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css',
    ];

    /**
     * The list of default Javascript libraries
     *
     * @var string[]
     */
    protected $javascript = [
        '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js',
        '//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js',
        '//cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js',
        '//cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js',
        '//cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js',
    ];

    /**
     * Return list of libraries
     *
     * @param array   $css        Other css libraries to merge
     * @param array   $javascript Other javascript library to merge
     * @param false[] $replace    Decide if you wont merge or replace the css or javascript libraries
     */
    public function getExternalLibraries(array $css = [], array $javascript = [], array $replace = ['css' => false, 'js' => false])
    {
        if (isset($replace['css']) && $replace['css']) {
            $this->css = $css;
        } elseif (isset($replace['css']) && ! $replace['css']) {
            $this->css = array_merge($this->css, $css);
        } else {
            $this->css = [];
        }

        if (isset($replace['js']) && $replace['js']) {
            $this->javascript = $javascript;
        } elseif (isset($replace['js']) && ! $replace['js']) {
            $this->javascript = array_merge($this->javascript, $javascript);
        } else {
            $this->javascript = [];
        }

        // Preloading content
        foreach ($this->css as $el) {
            echo '	<link rel="preload" href="' . $el . '" as="style">' . PHP_EOL;
        }

        foreach ($this->javascript as $el) {
            echo '	<link rel="preload" href="' . $el . '" as="script">' . PHP_EOL;
        }

        // Add CSS ang Javascript libraries to page
        foreach ($this->css as $el) {
            echo '	<link rel="stylesheet" type="text/css" href="' . $el . '">' . PHP_EOL;
        }

        foreach ($this->javascript as $el) {
            echo '	<script src="' . $el . '"></script>' . PHP_EOL;
        }
    }

    /**
     * Minimize javascript code
     * https://datayze.com/howto/minify-javascript-with-php
     *
     * @param string $javascript
     *
     * @return string|string[]|null
     */
    public function minimizeJavascript(string $javascript)
    {
        $javascript = preg_replace(["/\\s+\n/", "/\n\\s+/", '/ +/'], ["\n", "\n ", ' '], $javascript);

        // condense spaces
        $javascript = preg_replace("/\\s*\n\\s*/", "\n", $javascript); // spaces around newlines
        $javascript = preg_replace('/\\h+/', ' ', $javascript); // \h+ horizontal white space
        // remove unnecessary horizontal spaces around non variables (alphanumerics, underscore, dollar sign)
        //$javascript = preg_replace("/\h([^A-Za-z0-9\_\$])/", '$1', $javascript); //Causa problemi con le icone nella tabella dei menu
        return preg_replace('/([^A-Za-z0-9\\_$])\\h/', '$1', $javascript);
    }

    /**
     * Generate $(document).ready(function(){} block and include javascript code
     * to draggable form modal
     *
     * @param string $id
     * @param Configuration $configuration
     */
    public function getDocumentReady(string $id, Configuration $configuration): string
    {
        $result = '
			var ' . $id . " = $('#" . $id . "').DataTable({
				'paging': " . $configuration->getPaging() . ",
				'pagingType': '" . $configuration->getPagingType() . "',
				'ordering': " . $configuration->getOrdering() . ",
				'info': " . $configuration->getInfo() . ",
				'searching': " . $configuration->getSearching() . ",
				'lengthMenu': " . $configuration->getLengthMenu() . ",
				'processing': " . $configuration->getProcessing() . ",
				'serverSide': " . $configuration->getServerSide() . ",
				'autoWidth': " . $configuration->getAutoWidth() . ",
				'scrollX': " . $configuration->getScrollX() . ',
				';

        if ($configuration->getServerSide() === 'true') {
            //$result .= "'ajax': '" 	. $ajax->getDataSource() . "',";
            $result .= "
				'ajax':{
					url: '" . $configuration->getDataSource() . "',
					type: 'GET',
				},
			";
        } else {
            $result .= "
			'data': " . $configuration->getDataSource() . ',';
        }

        if (count($configuration->getColumns()) > 0) {
            $result .= "
			'columns': [";

            for ($x = 0; $x < count($configuration->getColumns()); $x++) {
                $column = $configuration->getColumns()[$x];
                $result .= "
					{
					'data': '" . $column->getName() . "',
					'searchable': " . $column->getSearchable() . ",
					'visible': " . $column->getVisible() . ",
					'title': '" . $column->getTitle() . "',
					},";
            }

            $result .= '
			],';
        }

        $result .= '
		});
		';

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

        return '
		$(document).ready(function() {
		 		' . $result . '
				} );
		';
    }

    /**
     * @param string $script
     */
    public function getJavascript($script = ''): string
    {
        //$javascript = $this->minimizeJavascript( $this->getDocumentReady($script) );
        $javascript_custom = $this->minimizeJavascript($script);

        return '<script>' . $javascript_custom . '</script>';
    }
}
