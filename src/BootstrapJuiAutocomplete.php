<?php

namespace denis909\yii;

class BootstrapJuiAutocomplete extends \yii\jui\AutoComplete
{

	public $registerAssets = TRUE;

	public $resultsOptions = [
		'id' => 'autocomplete-results',
		'class' => 'ui-autocomplete-results'
	];

	public function run()
	{
		if ($this->resultsId)
		{
			$this->clientOptions['appendTo'] = '#' . $this->resultsId;
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