<?php

namespace fatjiong\chosen;

use yii\web\View;
use yii\widgets\InputWidget;

/**
 * This is just an example.
 */
class Chosen extends InputWidget
{
    public $id;
    public $name;
    public $template;
    public $placeholder;
    public $options;
    public $style;

    public function init()
    {
        if (empty($this->name)) {
            // $this->name = $this->hasModel() ? Html::getInputName($this->model, $this->attribute) : $this->id;
            $this->name = 'chosen';
        }

        if (empty($this->id)) {
            $this->id = 'chosen';
        }

        if (!$this->placeholder) {
            $this->placeholder = '请选择';
        }

        $template = '<div class="input-group"><select id="' . $this->id . '" data-placeholder="' . $this->placeholder . '" class="chosen-select" name="' . $this->name . '" multiple tabindex="4" style="' . $this->style . '">';

        if ($this->options) {
            foreach ($this->options as $key => $value) {
                $template .= '<option value="' . $key . '" hassubinfo="true">' . $value . '</option>';
            }
        }

        $template .= '</select></div>';

        $this->template = $template;
        parent::init();
    }

    public function run()
    {
        $this->registerClientScript();
        return $this->template;
    }

    // 注册组件
    private function registerClientScript()
    {
        ChosenAsset::register($this->view);

        $script = 'var config = {
            ".chosen-select": {},
            ".chosen-select-deselect": {
                allow_single_deselect: !0
            },
            ".chosen-select-no-single": {
                disable_search_threshold: 10
            },
            ".chosen-select-no-results": {
                no_results_text: "Oops, nothing found!"
            },
            ".chosen-select-width": {
                width: "95%"
            }
        };
        for (var selector in config) $(selector).chosen(config[selector]);';
        $this->view->registerJs($script, View::POS_READY);
    }
}
