package com.example.do_angame;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.EditText;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.auth.api.signin.GoogleSignInAccount;
import com.google.android.gms.auth.api.signin.GoogleSignInOptions;
import com.google.android.gms.auth.api.signin.GoogleSignInResult;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.SignInButton;
import com.google.android.gms.common.api.GoogleApiClient;

import java.security.NoSuchAlgorithmException;

public class DangNhapActivity extends AppCompatActivity implements GoogleApiClient.OnConnectionFailedListener, View.OnClickListener {
    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;
    private EditText mTenDangNhap;
    private  EditText mMatKhau;
    private String duongdan="http://10.0.2.2:8000/api/nguoi-choi";


    //google
    private GoogleApiClient mGoogleApiClient;
    int RC_SIGN_IN=001;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dang_nhap);

        mTenDangNhap = findViewById(R.id.EditText_phone);
        mMatKhau  = findViewById(R.id.EditText_Pass);

        //tạo shared lưu thông tin tài khoản google
        sharedPreferences=getSharedPreferences("nguoichoi_google",MODE_PRIVATE);
        //Yêu cầu người dùng cung cấp thông tin
        GoogleSignInOptions gso=new  GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN)
                .requestEmail()
                .build();
        //kết nối google API client
        mGoogleApiClient=new GoogleApiClient.Builder(this).enableAutoManage(this,this)
                .addApi(Auth.GOOGLE_SIGN_IN_API,gso)
                .build();
        // Button Google Sig-in
        SignInButton signInButton=findViewById(R.id.btnSignIn);
        signInButton.setSize(signInButton.SIZE_STANDARD);

        findViewById(R.id.btnSignIn).setOnClickListener(this);


    }

    public void DangNhapThanhCong(View view) throws NoSuchAlgorithmException {

        GetAPINguoiChoi nguoiChoi = (GetAPINguoiChoi) new GetAPINguoiChoi(this, mTenDangNhap.getText().toString(), mMatKhau.getText().toString()).execute(duongdan);
    }

    public void DangKy(View view) {
        Intent intent = new Intent(this, DangKyActivity.class);
        startActivity(intent);
    }
    public void QuenMatKhau(View view) {
        Intent intent = new Intent(this, QuenMatKhauActivity.class);
        startActivity(intent);
    }
    // dang nhap google
    @Override
    public void onConnectionFailed(@NonNull ConnectionResult connectionResult) {
        Log.d("Failed",connectionResult+"");
    }
    //FUNCTION Dang Nhap
    private  void SigIn(){
        Intent signInIntent=Auth.GoogleSignInApi.getSignInIntent(mGoogleApiClient);
        startActivityForResult(signInIntent,RC_SIGN_IN);

        Log.d("KET NOI THANH CONG",mGoogleApiClient.isConnected()+"");

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode==RC_SIGN_IN){
            GoogleSignInResult result=Auth.GoogleSignInApi.getSignInResultFromIntent(data);
            handleSignInResult(result);
            Intent intent=new Intent(DangNhapActivity.this,MainActivity.class);
            intent.putExtra("loaitk","1");
            startActivity(intent);

        }
    }
    private  void handleSignInResult(GoogleSignInResult result){
        if(result.isSuccess()){
            GoogleSignInAccount acct=result.getSignInAccount();
            editor=sharedPreferences.edit();
            editor.putString("hinh_dai_dien",acct.getPhotoUrl().toString());
            editor.putString("mail",acct.getEmail());
            editor.putString("ten_dap_nhap",acct.getDisplayName());
            editor.putString("mat_khau","");
            editor.commit();

        }
        else {

        }
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.btnSignIn:
                SigIn();
                break;

        }

    }


}
