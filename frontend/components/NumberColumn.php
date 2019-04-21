<?php

namespace frontend\components;

use yii\grid\DataColumn;

class NumberColumn extends DataColumn
{
    private $_total = 0;
    private $_priceTotal = 0;

    public function renderDataCellContent($model, $key, $index)
    {
        $value = parent::renderDataCellContent($model, $key, $index);
        $this->_total += (float)$value;
        return $value;
    }

    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);
        $this->_priceTotal += (float)$value;
        return $value;
    }

    protected function renderFooterCellContent()
    {
        return $this->grid->formatter->format($this->_total, $this->format);
    }
}
