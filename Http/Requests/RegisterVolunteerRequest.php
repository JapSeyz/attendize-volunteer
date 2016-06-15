<?php namespace Modules\Volunteers\Http\Requests;

use App\Http\Requests\Request;

class RegisterVolunteerRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required',
			'password' => 'required|confirmed',
			'address' => 'required',
			'zip' => 'required|digits:4',
			'phone' => 'required|digits:8',
			'mobile' => 'digits:8',
			'email' => 'required|email',
			'birthday' => 'required|date_format:d-m-Y',
		];
	}

}
