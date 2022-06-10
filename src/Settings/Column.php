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
 * Class Column
 */
class Column
{
    // region Properties

    /**
     * @var string
     */
    protected $searchable = 'false';

    /**
     * Set a descriptive name for a column
     *
     * @var string
     */
    protected $name = '';

    /**
     * Set the column title
     *
     * @var string
     */
    protected $title = '';

    /**
     * Enable or disable the display of this column
     *
     * @var string
     */
    protected $visible = 'true';

    /**
     * Render (process) the data for use in the table
     *
     * @var string
     */
    protected $render = '';

    // endregion

    // region Constructor

    /**
     * Column constructor.
     */
    public function __construct(?array $config = null)
    {
        if (isset($config['name'])) {
            $this->setName($config['name']);
        }

        if (isset($config['searchable'])) {
            $this->setSearchable($config['searchable']);
        }

        if (isset($config['visible'])) {
            $this->setVisible($config['visible']);
        }

        if (isset($config['title'])) {
            $this->setTitle($config['title']);
        }
    }

    // endregion

    // region Setters

    public function setSearchable(bool $searchable): Column
    {
        $this->searchable = $searchable ? 'true' : 'false';

        return $this;
    }

    public function setName(string $name): Column
    {
        $this->name = $name;

        return $this;
    }

    public function setTitle(string $title): Column
    {
        $this->title = $title;

        return $this;
    }

    public function setVisible(bool $visible): Column
    {
        $this->visible = $visible ? 'true' : 'false';

        return $this;
    }

    public function setRender(string $render): Column
    {
        $this->render = $render;

        return $this;
    }

    // endregion

    // region Getters

    public function getSearchable(): string
    {
        return $this->searchable;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getVisible(): string
    {
        return $this->visible;
    }

    public function getRender(): string
    {
        return $this->render;
    }

    // endregion
}
