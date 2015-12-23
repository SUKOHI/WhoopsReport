<?php namespace Sukohi\WhoopsReport;

class WhoopsReport {

	public function view($exception) {

		$trans_keys = ['title', 'description', 'button'];

		foreach ($trans_keys as $trans_key) {

			$key = 'whoops-report::message.'. $trans_key;

			if(trans($key) == $key) {

				return \View::make('whoops-report::localization_example');

			}

		}

		return \View::make('whoops-report::report_form', [
			'exception' => $exception
		]);

	}

	public function parameterToTag($parameter, $names = [], $var_name = '') {

		if(is_array($parameter)) {

			foreach ($parameter as $name => $value) {

				if(empty($var_name) && empty($names)) {

					$parameter_names = [$name];

				} else {

					$parameter_names = array_merge($names, ['['. $name .']']);

				}

				$this->parameterToTag($value, $parameter_names, $var_name);

			}

		} else {

			echo '<input type="hidden" name="'. $var_name . implode('', $names) .'" value="'. $parameter .'">' ."\n";

		}

	}

	public function send($email, $options = []) {

		$email_params = \Input::only(['errors', 'params', 'bug_description']);

		\Mail::send('whoops-report::report_email', $email_params, function($message) use($email, $options)
		{
			$message->to($email)
				->from($email, 'Whoops Report')
				->subject(trans('whoops-report::message.title'));

			if(isset($options['cc'])) {

				foreach ($options['cc'] as $cc) {

					$message->cc($cc);

				}

			}

			if(isset($options['bcc'])) {

				foreach ($options['bcc'] as $bcc) {

					$message->bcc($bcc);

				}

			}

		});

		return \View::make('whoops-report::report_form_complete');

	}

	public function messages() {

		return [
			'title' => 'Error occurred.',
			'description' => 'We are sorry. Please report the bug description as detailed as possible.',
			'button' => 'Report',
			'confirm' => 'Are you sure you want to submit this form?',
			'complete' => 'Your report was sent successfully. Thank you for your cooperation.'
		];

	}

}