<?php

namespace App\Http\Controllers\User;

use App\Domain\Users\PrimerUsers\Actions\AdminDestroyAction;
use App\Domain\Users\PrimerUsers\Actions\AdminMerchantUpdateAction;
use App\Domain\Users\PrimerUsers\Actions\PrimerUserStoreAction;
use App\Domain\Users\PrimerUsers\Actions\PrimerUserUpdateAction;
use App\Domain\Users\Users\Actions\UserBlockedAction;
use App\Domain\Users\Users\Actions\UserStoreAction;
use App\Domain\Users\PrimerUsers\DTO\PrimerUserDTO;
use App\Domain\Users\Users\Actions\UserUpdateAction;
use App\Domain\Users\Users\DTO\UserDTO;
use App\Domain\Users\Users\Model\User;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\RegisterSocialate\RegisterOrLoginRequest;
use App\Http\Requests\User\Auth\ChangePasswordRequest;
use App\Http\Requests\User\Auth\PrimerUserLogInRequest;
use App\Http\Requests\User\Auth\PrimerUserRequest;
use App\Http\Requests\User\Auth\ResetPasswordRequest;
use App\Http\Requests\User\Auth\UpdateAdminMerchantRequest;
use App\Http\Requests\User\Auth\UpdatePrimerUserRequest;
use App\Http\Requests\User\Auth\UpdateUserRequest;
use App\Http\Requests\User\Auth\UserLogInRequest;
use App\Http\Requests\User\Auth\UserRequest;
use App\Http\Requests\User\Auth\UserWebRequest;
use App\Http\ViewModels\Users\PrimerUsers\AdminIndexVM;
use App\Http\ViewModels\Users\PrimerUsers\MerchantIndexVM;
use App\Http\ViewModels\Users\PrimerUsers\PrimerUserProfileVM;
use App\Http\ViewModels\Users\PrimerUsers\PrimerUserShowByID;
use App\Http\ViewModels\Users\PrimerUsers\PrimerUserShowVM;
use App\Http\ViewModels\Users\Users\UserIndexVM;
use App\Http\ViewModels\Users\Users\UserProfileVM;
use App\Http\ViewModels\Users\Users\UserShowVM;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(UserRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $userDTO = UserDTO::fromRequest($data);
        $user = UserStoreAction::execute($userDTO);
        return response()->json(Response::success($user->load('language')), 200);
    }

    public function register_web(UserWebRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $userDTO = UserDTO::fromRequest($data);
        $user = UserStoreAction::execute($userDTO);
        return response()->json(Response::success($user->load('language')), 200);
    }

    public function login_user(UserLogInRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = (new UserShowVM(UserDTO::fromRequest($request->validated())))->toArray();

        if ($user != null) {
            if (!Auth::attempt(['phone_number' => request('phone_number'), 'password' => request('password')])) {
                return response()->json(Response::error('Invalid Information'), 400);
            }
            $user->device_token = $request['device_token'];
            if ($user->device_token != null)
                $user->update();
            $token = $user->createToken('personal access token');
            $user->setAttribute('token', $token->accessToken);
            return response()->json(Response::success($user->load('language')));
        } else
            return response()->json(Response::error('Invalid Information'), 400);
    }


    public function login_admin(PrimerUserLogInRequest $request): \Illuminate\Http\JsonResponse
    {
        $primerUser = (new PrimerUserShowVM(PrimerUserDTO::fromRequest($request->validated())))->toArray();

        if ($primerUser != null) {
            if (!Hash::check(request('password'), $primerUser->password)) {
                return response()->json(Response::error('Invalid Information'), 400);
            }
            if ($primerUser->type_id == 1) {
                $primerUser->device_token = $request['device_token'];
                if ($primerUser->device_token != null)
                    $primerUser->update();
                $token = $primerUser->createToken('personal access token');
                $primerUser->setAttribute('token', $token->accessToken);
                return response()->json(Response::success($primerUser));
            } else
                return response()->json(Response::error('Invalid Information'), 400);
        } else
            return response()->json(Response::error('Invalid Information'), 400);
    }

    public function login_merchant(PrimerUserLogInRequest $request): \Illuminate\Http\JsonResponse
    {
        $primerUser = (new PrimerUserShowVM(PrimerUserDTO::fromRequest($request->validated())))->toArray();

        if ($primerUser != null) {
            if (!Hash::check(request('password'), $primerUser->password)) {
                return response()->json(Response::error('Invalid Information'), 400);
            }
            if ($primerUser->type_id == 2) {
                $primerUser->device_token = $request['device_token'];
                if ($primerUser->device_token != null)
                    $primerUser->update();
                $token = $primerUser->createToken('personal access token');
                $primerUser->setAttribute('token', $token->accessToken);
                return response()->json(Response::success($primerUser, $primerUser->store->language));
            } else
                return response()->json(Response::error('Invalid Information'), 400);
        } else
            return response()->json(Response::error('Invalid Information'), 400);
    }


    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {

        if (Auth::guard('user')->user() != null) {
            $request->user()->token()->revoke();
        } elseif (Auth::guard('user_socialite')->user() != null) {
            Auth::guard('user_socialite')->user()->api_token = null;
            Auth::guard('user_socialite')->user()->update();
        }
        return response()->json(Response::success("Logout Success"));
    }

    public function add_phone_number(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $user_id  = Auth::guard('user')->id() ?? Auth::guard('user_socialite')->id();
        $user = User::firstWhere('id', $user_id);
        $user['phone_number'] = $request->phone_number;
        $user->update();
        return response()->json(Response::success($user), 200);
    }
    public function confirm(ChangePasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = (new UserShowVM(UserDTO::fromRequest($request->validated())))->toArray();
        if ($user->phone_number != null) {
            try {
                $random = rand(100000, 999999);
                $basic = new \Vonage\Client\Credentials\Basic("4248d7b7", "48tKfVvPjW2G2Dp7");
                $client = new \Vonage\Client($basic);
                $response = $client->sms()->send(
                    new \Vonage\SMS\Message\SMS($user->phone_number, DATE_RFC2822, 'The code for your account confirmation process is : ' . $random)
                );

                $message = $response->current();

                if ($message->getStatus() == 0) {
                    $user['code'] = $random;
                    $user->update();
                    return response()->json(Response::success("Code generate is correct"));
                } else {
                    return response()->json(Response::error("The message failed with status:" . $message->getStatus()));
                }
            } catch (Exception $e) {
                return response()->json(Response::error("Phone number is not valid"), 400);
            }
        } else
            return response()->json(Response::error("Phone number is not correct"), 400);
    }

    public function verify(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:6|max:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::where('id', Auth::guard('user')->id() ?? Auth::guard('user_socialite')->id())->first();
        if ($user != null) {
            if ($user['code'] != null && $user['code'] == $request->code) {
                $user['verify'] = 1;
                $user->update();
                return response()->json(Response::success($user));
            }
            return response()->json(Response::error('The code is not valid'), 400);
        }
        return response()->json(Response::error('verify is do not complete'), 400);
    }

    public function reset_code(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:6|max:6',
            'phone_number' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::where('phone_number', $request->phone_number)->first();
        if ($user != null) {
            if ($user['code'] != null && $user['code'] == $request->code) {
                return response()->json(Response::success($user));
            }
        }
        return response()->json(Response::error('verify is do not complete'), 400);
    }

    public function change_password(ChangePasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = (new UserShowVM(UserDTO::fromRequest($request->validated())))->toArray();
        if ($user != null) {
            try {
                $random = rand(100000, 999999);
                $basic = new \Vonage\Client\Credentials\Basic("4248d7b7", "48tKfVvPjW2G2Dp7");
                $client = new \Vonage\Client($basic);
                $response = $client->sms()->send(
                    new \Vonage\SMS\Message\SMS($user->phone_number, DATE_RFC2822, 'The code for your password reset process is : ' . $random)
                );
                $message = $response->current();

                if ($message->getStatus() == 0) {
                    $user['code'] = $random;
                    $user->update();
                    return response()->json(Response::success('Code generate is correct'));
                } else {
                    return response()->json(Response::error("The message failed with status:" . $message->getStatus()), 400);
                }
            } catch (Exception $e) {
                return response()->json(Response::error("Phone number is not valid"), 400);
            }
        } else
            return response()->json(Response::error("Phone number is not correct"), 400);
    }

    public function reset_password(ResetPasswordRequest $request)
    {
        $user = (new UserShowVM(UserDTO::fromRequest($request->validated())))->toArray();
        if ($user != null) {
            $user['password'] = Hash::make($request->password);
            $user->update();
            return response()->json(Response::success("Reset Password is Success"));
        }
        return response()->json(Response::error("Reset Password is failed"), 400);
    }


    public function add_primer_user(PrimerUserRequest $request, StorePermissionRequest $storePermissionRequest): \Illuminate\Http\JsonResponse
    {
        //add User
        $data = $request->validated();
        $userDTO = PrimerUserDTO::fromRequest($data);
        $user = PrimerUserStoreAction::execute($userDTO);

        //add Permission
        PermissionController::store($storePermissionRequest);

        return response()->json(Response::success($user), 200);
    }

    public function get_merchants(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new MerchantIndexVM())->toArray()));
    }

    public function get_admins(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new AdminIndexVM())->toArray()));
    }

    public function get_users(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new UserIndexVM())->toArray()));
    }

    public function show_primer($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new PrimerUserShowByID($id))->toArray()));
    }

    // // Google login
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->stateless()->redirect();
    // }

    // // Google callback
    // public function handleGoogleCallback()
    // {
    //     $user = Socialite::driver('google')->stateless()->user();
    //     $user = $this->_registerOrLoginUser($user);
    //     return response()->json(Response::success($user));
    // }

    // // Facebook login For User
    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->stateless()->redirect();
    // }

    // // Facebook callback For User
    // public function handleFacebookCallback()
    // {

    //     $user = Socialite::driver('facebook')->stateless()->user();

    //         $user = $this->_registerOrLoginUser($user);
    //         return response()->json(Response::success($user));

    // }


    protected function _registerOrLoginUser(RegisterOrLoginRequest $request): \Illuminate\Http\JsonResponse
    {


        $user = (new UserShowVM(UserDTO::fromRequest($request)))->toArray();
        if ($user !== null) {
            Auth::login($user);
            $user->api_token = $request->token;
            $user->device_token = $request->device_token;
            $user->is_block = 1;
            if ($user->device_token != null)
                $user->update();
            return response()->json(Response::success($user->load('language')), 200);
        } else {

            $data = $request->validated();
            $userDTO = UserDTO::fromRequest($data);
            $user = UserStoreAction::execute($userDTO);
            Auth::login($user);
            return response()->json(Response::success($user->load('language')));
        }
    }

    public function update_user(UpdateUserRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $userDTO = UserDTO::fromRequest($data);
        $user = UserUpdateAction::execute($userDTO);
        return response()->json(Response::success($user));
    }

    public function profile_user(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new UserProfileVM())->toArray()));
    }


    public function update_primer(UpdatePrimerUserRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $primerUserDTO = PrimerUserDTO::fromRequest($data);
        $primerUser = PrimerUserUpdateAction::execute($primerUserDTO);
        return response()->json(Response::success($primerUser));
    }

    public function update_admin_merchant(UpdateAdminMerchantRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $primerUserDTO = PrimerUserDTO::fromRequest($data);
        $primerUser = AdminMerchantUpdateAction::execute($primerUserDTO,$id);
        return response()->json(Response::success($primerUser));
    }

    public function block_user(UpdateUserRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $userDTO = UserDTO::fromRequest($data);
        $user = UserBlockedAction::execute($userDTO, $id);
        return response()->json(Response::success($user));
    }

    public function profile_primer(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new PrimerUserProfileVM())->toArray()));
    }

    public function delete_primer($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(AdminDestroyAction::execute($id)));
    }
}
