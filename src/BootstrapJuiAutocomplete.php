<?php

namespace denis909\yii;

class BootstrapJuiAutoComplete extends \yii\jui\AutoComplete
{

	public $registerAssets = TRUE;

	public $resultsOptions = [
		'id' => 'autocomplete-results',
		'class' => 'ui-autocomplete-results'
	];

	public function run()
	{
		if (!empty($this->resultsOptions['id']))
		{
			$this->clientOptions['appendTo'] = '#' . $this->resultsOptions['id'];
		}

		if ($this->registerAssets)
		{
			static::registerAssets($this->view);
		}

		$return = parent::run();

		if ($this->resultsOptions)
		{
			$return .= "\n" . \yii\helpers\Tag('div', null, $this->resultsOptions);
		}

		return $return;
	}

	public static function registerAssets($view)
	{
		BootstrapJuiAutocompleteAsset::register($view);
	}

}