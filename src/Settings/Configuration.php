<?php

/**
 * This file is part of DataTables.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\DataTables\Settings;

/**
 * Class Configuration
 */
class Configuration
{
    // region Properties

    // region DataTables - Features

    /**
     * Feature control DataTables' smart column width handling.
     *
     * Enable or disable automatic column width calculation.
     * This can be disabled as an optimisation (it takes a finite amount of time to calculate the widths)
     * if the tables widths are passed in using columns.width.
     *
     * @var string
     */
    protected $autoWidth = 'false';

    /**
     * Feature control deferred rendering for additional speed of initialisation.
     *
     * By default, when DataTables loads data from an Ajax or Javascript data source (ajax and data respectively) it will create all HTML elements needed up-front.
     * When working with large data sets, this operation can take a not-insignificant amount of time, particularly in older browsers such as IE6-8.
     * This option allows DataTables to create the nodes (rows and cells in the table body) only when they are needed for a draw
     *
     * @var string
     */
    protected $deferRender = 'false';

    /**
     * Feature control table information display field.
     *
     * When this option is enabled, Datatables will show information about the table including information about filtered
     * data if that action is being performed. This option allows that feature to be enabled or disabled.
     *
     * @var string
     */
    protected $info = 'false';

    /**
     * Feature control ordering (sorting) abilities in DataTables.
     *
     * Enable or disable ordering of columns - it is as simple as that! DataTables, by default,
     * allows end users to click on the header cell for each column, ordering the table by the data in that column.
     * The ability to order data can be disabled using this option.
     *
     * @var string
     */
    protected $ordering = 'true';

    /**
     * Enable or disable table pagination.
     *
     * DataTables can split the rows in tables into individual pages, which is an efficient method of showing a large number of records in a small space.
     * The end user is provided with controls to request the display of different data as the navigate through the data.
     * This feature is enabled by default, but if you wish to disable it, you may do so with this parameter.
     *
     * @var string
     */
    protected $paging = 'true';

    /**
     * Pagination button display options.
     *
     * The pagination option of DataTables will display a pagination control below the table (by default, its position can be changed using dom and CSS)
     * with buttons that the end user can use to navigate the pages of the table. Which buttons are shown in the pagination control are defined by the option given here.
     *
     * DataTables has six built-in paging button arrangements:
     * 		numbers 			- Page number buttons only (1.10.8)
     * 		simple 				- 'Previous' and 'Next' buttons only
     * 		simple_numbers 		- 'Previous' and 'Next' buttons, plus page numbers
     * 		full 				- 'First', 'Previous', 'Next' and 'Last' buttons
     * 		full_numbers 		- 'First', 'Previous', 'Next' and 'Last' buttons, plus page numbers
     * 		first_last_numbers 	- 'First' and 'Last' buttons, plus page numbers
     *
     * @var string
     */
    protected $pagingType = 'full_numbers';

    /**
     * Feature control the processing indicator
     *
     * Enable or disable the display of a 'processing' indicator when the table is being processed (e.g. a sort).
     * This is particularly useful for tables with large amounts of data where it can take a noticeable amount of time to sort the entries.
     *
     * @var string
     */
    protected $processing = 'true';

    /**
     * Horizontal scrolling.
     *
     * Enable horizontal scrolling. When a table is too wide to fit into a certain layout,
     * or you have a large number of columns in the table, you can enable horizontal (x)
     * scrolling to show the table in a viewport, which can be scrolled.
     *
     * @var string
     */
    protected $scrollX = 'true';

    /**
     * Vertical scrolling.
     *
     * Enable vertical scrolling.
     * Vertical scrolling will constrain the DataTable to the given height, and enable scrolling for any data which overflows the current viewport.
     * This can be used as an alternative to paging to display a lot of data in a small area (although paging and scrolling can both be enabled at the same time if desired).
     *
     * @var string
     */
    protected $scrollY = '200px';

    /**
     * Allow the table to reduce in height when a limited number of rows are shown.
     *
     * When vertical (y) scrolling is enabled through the use of the scrollY option,
     * DataTables will force the height of the table's viewport to the given height at all times (useful for layout).
     *
     * @var string
     */
    protected $scrollCollapse = 'false';

    /**
     * Feature control search (filtering) abilities.
     *
     * This option allows the search abilities of DataTables to be enabled or disabled.
     * Searching in DataTables is "smart" in that it allows the end user to input multiple words (space separated)
     * and will match a row containing those words, even if not in the order that was specified (this allow matching across multiple columns).
     *
     * @var string
     */
    protected $searching = 'true';

    /**
     * Feature enabled Server-side processing
     *
     * With server-side processing enabled, all paging, searching, ordering actions that DataTables performs are handed off to a server
     * where an SQL engine (or similar) can perform these actions on the large data set (after all, that's what the database engine is designed for!).
     * As such, each draw of the table will result in a new Ajax request being made to get the required data.
     *
     * @var string
     */
    protected $serverSide = 'true';

    /**
     * State saving - restore table state on page reload.
     *
     * Enable or disable state saving.
     * When enabled aDataTables will store state information such as pagination position, display length, filtering and sorting.
     * When the end user reloads the page the table's state will be altered to match what they had previously set up.
     *
     * @var string
     */
    protected $stateSave = 'false';

    // endregion

    // region DataTables - Options

    /**
     * Change the options in the page length select list.
     *
     * This parameter allows you to readily specify the entries in the length drop down select list that DataTables shows when pagination is enabled.
     * It can be either:
     *	- 1D array of integer values which will be used for both the displayed option and the value to use for the display length
     *  - 2D array which will use the first inner array as the page length values and the second inner array as the displayed options. This is useful for language strings such as 'All').
     *
     * @var string
     */
    protected $lengthMenu = '[[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]';

    // endregion

    // region DataTables - Column

    /**
     * Set column specific initialisation properties.
     *
     * The columns option in the initialisation parameter allows you to define details about the way individual columns behave.
     *
     * @var array
     */
    protected $columns = [Column::class];

    // endregion

    /**
     * DataTables can obtain data from four different fundamental sources:
     * HTML document (DOM)
     * Javascript (array / objects)
     * Ajax sourced data with client-side processing
     * Ajax sourced data with server-side processing
     */
    protected $dataSource;

    // endregion

    // region Constructor

    /**
     * Ajax constructor.
     */
    public function __construct()
    {
    }

    // endregion

    // region Setters

    /**
     * Enable or disable automatic column width calculation
     */
    public function setAutoWidth(bool $autoWidth): Configuration
    {
        $this->autoWidth = $autoWidth ? 'true' : 'false';

        return $this;
    }

    /**
     * Enable or disable deferred rendering for additional speed of initialisation
     */
    public function setDeferRender(bool $deferRender): Configuration
    {
        $this->deferRender = $deferRender ? 'true' : 'false';

        return $this;
    }

    /**
     * Enable or disable table information display field.
     */
    public function setInfo(bool $info): Configuration
    {
        $this->info = $info ? 'true' : 'false';

        return $this;
    }

    /**
     * Enable or disable ordering of columns
     */
    public function setOrdering(bool $ordering): Configuration
    {
        $this->ordering = $ordering ? 'true' : 'false';

        return $this;
    }

    /**
     * Enable or disable table pagination
     */
    public function setPaging(bool $paging): Configuration
    {
        $this->paging = $paging ? 'true' : 'false';

        return $this;
    }

    /**
     * Pagination button display options
     *
     * DataTables has six built-in paging button arrangements:
     *        numbers            - Page number buttons only (1.10.8)
     *        simple                - 'Previous' and 'Next' buttons only
     *        simple_numbers        - 'Previous' and 'Next' buttons, plus page numbers
     *        full                - 'First', 'Previous', 'Next' and 'Last' buttons
     *        full_numbers        - 'First', 'Previous', 'Next' and 'Last' buttons, plus page numbers
     *        first_last_numbers    - 'First' and 'Last' buttons, plus page numbers
     */
    public function setPagingType(string $pagingType): Configuration
    {
        $this->pagingType = $pagingType;

        return $this;
    }

    /**
     * Enable or disable the display of a 'processing' indicator
     */
    public function setProcessing(bool $processing): Configuration
    {
        $this->processing = $processing ? 'true' : 'false';

        return $this;
    }

    /**
     * Enable horizontal scrolling.
     */
    public function setScrollX(bool $scrollX): Configuration
    {
        $this->scrollX = $scrollX ? 'true' : 'false';

        return $this;
    }

    /**
     * Enable vertical scrolling.
     */
    public function setScrollY(string $scrollY): Configuration
    {
        $this->scrollY = $scrollY;

        return $this;
    }

    /**
     * Allow the table to reduce in height when a limited number of rows are shown.
     */
    public function setScrollCollapse(bool $scrollCollapse): Configuration
    {
        $this->scrollCollapse = $scrollCollapse ? 'true' : 'false';

        return $this;
    }

    /**
     * Feature control search (filtering) abilities.
     */
    public function setSearching(bool $searching): Configuration
    {
        $this->searching = $searching ? 'true' : 'false';

        return $this;
    }

    /**
     * Enable or disable Server-side processing
     */
    public function setServerSide(bool $serverSide): Configuration
    {
        $this->serverSide = $serverSide ? 'true' : 'false';

        return $this;
    }

    /**
     * Enable or disable state saving.
     */
    public function setStateSave(bool $stateSave): Configuration
    {
        $this->stateSave = $stateSave ? 'true' : 'false';

        return $this;
    }

    /**
     * Change the options in the page length select list.
     */
    public function setLengthMenu(string $lengthMenu): Configuration
    {
        $this->lengthMenu = $lengthMenu;

        return $this;
    }

    /**
     * Set column specific initialisation properties.
     */
    public function setColumns(array $columns): Configuration
    {
        $this->columns = $columns;

        return $this;
    }

    public function setDataSource($dataset): Configuration
    {
        $this->dataSource = $dataset;

        return $this;
    }
    // endregion

    // region Getters

    public function getAutoWidth(): string
    {
        return $this->autoWidth;
    }

    public function getDeferRender(): string
    {
        return $this->deferRender;
    }

    public function getInfo(): string
    {
        return $this->info;
    }

    public function getOrdering(): string
    {
        return $this->ordering;
    }

    public function getPaging(): string
    {
        return $this->paging;
    }

    public function getPagingType(): string
    {
        return $this->pagingType;
    }

    public function getProcessing(): string
    {
        return $this->processing;
    }

    public function getScrollX(): string
    {
        return $this->scrollX;
    }

    public function getScrollY(): string
    {
        return $this->scrollY;
    }

    public function getScrollCollapse(): string
    {
        return $this->scrollCollapse;
    }

    public function getSearching(): string
    {
        return $this->searching;
    }

    public function getServerSide(): string
    {
        return $this->serverSide;
    }

    public function getStateSave(): string
    {
        return $this->stateSave;
    }

    public function getLengthMenu(): string
    {
        return $this->lengthMenu;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function getDataSource(): string
    {
        return $this->dataSource;
    }

    // endregion
}
