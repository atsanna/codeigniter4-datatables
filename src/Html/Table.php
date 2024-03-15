<?php

/**
 * This file is part of DataTables.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\DataTables\Html;

use atsanna\DataTables\Settings\Configuration;
use CodeIgniter\Model;

/**
 * Class Table
 */
class Table
{
    // region Properties

    /**
     * The model
     */
    protected ?Model $model = null;

    /**
     * The configuration
     */
    protected Configuration $configuration;

    // endregion

    // region Constructor

    /**
     * Table constructor.
     *
     * @return void
     */
    public function __construct(?Model $model = null)
    {
        // Assign the Model
        if ($model !== null) {
            $this->setModel($model);
        }

        // Configure DataTables
        $this->setConfiguration(new Configuration());

        // return $this;
    }

    // endregion

    // region Setters

    public function setModel(Model $model): Table
    {
        $this->model = $model;

        return $this;
    }

    public function setConfiguration(Configuration $configuration): Table
    {
        $this->configuration = $configuration;

        return $this;
    }

    // endregion

    // region Getters

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    // endregion

    // region Private Methods

    private function getFieldsFromModel(): array
    {
        $fields = [];

        foreach ($this->getModel()->__get('allowedFields') as $field) {
            $fields[] = $field;
        }

        return $fields;
    }

    /**
     * @return list<array>
     */
    /**
     * @phpstan-ignore-next-line
     */
    public function getTableData(): array
    {
        return [
            [
                'fields'          => $this->getFieldsFromModel(),
                'localize'        => 'User',
                'class'           => 'table table-bordered table-hover table-striped',
                'style'           => '',
                'id'              => $this->getModel()->__get('table') . '_' . time(),
                'data-id'         => '',
                'data-table_name' => $this->getModel()->__get('table'),
                'data-footer'     => true,
            ],
        ];
    }

    /**
     * Generate thead content from array of fields
     *
     * @param array $fields   The array of fields
     * @param bool  $localize The name of File for the localization
     */
    private function getTableHeader(array $fields = [], bool $localize = false): string
    {
        $head = '';

        foreach ($fields as $field) {
            if ($localize !== false) {
                $field = lang($localize . '.' . $field);
            }
            $head .= '<th>' . $field . '</th>';
        }

        return '<tr>' . $head . '</tr>';
    }

    // endregion

    // region Public Methods

    /**
     * Generate table content
     */
    public function render(?array $data = null): string
    {
        $param = '';
        if (isset($data['id'])) {
            $param .= ' id="' . $data['id'] . '"';
        }
        if (isset($data['data-id'])) {
            $param .= ' data-id="' . $data['data-id'] . '"';
        }
        if (isset($data['data-table_name'])) {
            $param .= ' data-table_name="' . $data['data-table_name'] . '"';
        }
        if (isset($data['class'])) {
            $param .= ' class="' . $data['class'] . '"';
        }
        if (isset($data['style'])) {
            $param .= ' style="' . $data['style'] . '"';
        }

        $localize = false;
        if (isset($data['localize'])) {
            $localize = $data['localize'];
        }

        $foot = '';
        if (isset($data['footer'])) {
            $footer = $data['footer'];
            if ($footer) {
                $foot = $this->getTableHeader($data['fields'], $localize);
            }
        }

        $table = '';
        if (isset($data['fields']) && is_array($data['fields'])) {
            $head  = $this->getTableHeader($data['fields'], $localize);
            $table = '<table ' . $param . '><thead>' . $head . '</thead><tbody></tbody><tfoot>' . $foot . '</tfoot></table>';
        }

        return $table;
    }

    // endregion

    // region CRUD

    /**
     * Fetches all results
     */
    /*  public function fetch_data(): array
      {
          $query  = null;
          $limit  = 0;
          $offset = 0;

          if ($_POST && $_POST !== []) {
              if (isset($_POST['query'])) {
                  $query = $_POST['query'];
                  // Join,Where,Subquery,ecc...
              }
              if (isset($_POST['limit'])) {
                  $limit = $_POST['limit'];
              }
              if (isset($_POST['offset'])) {
                  $offset = $_POST['offset'];
              }
          }

          $fields = '';

          for ($x = 0; $x < count($this->getModel()->__get('allowedFields')); $x++) {
              $fields .= $this->getModel()->__get('allowedFields')[$x] . ', ';
          }

          return $this->getModel()->select(substr($fields, 0, strlen($fields) - 1))->findAll($limit, $offset);
      }

      public function insert(): string
      {
          return 'insert';
      }

      public function update(): string
      {
          return 'update';
      }

      public function delete(): string
      {
          return 'delete';
      }*/

    // endregion
}
