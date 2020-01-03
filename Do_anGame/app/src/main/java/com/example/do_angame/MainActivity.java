package com.example.do_angame;

import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Paint;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.common.api.GoogleApiClient;
import com.squareup.picasso.Picasso;

public class MainActivity extends AppCompatActivity {
    private String sharedPrefFile ="com.example.do_angame";
    private SharedPreferences mPreferencesGoogle;
    private SharedPreferences mPreferencesTKnguoichoi;
    private ImageView imageView;
    private Button btnDangXuat,btnQLTK;
    private String loaitk;
    private String hinh_dai_dien;
    private  GoogleApiClient mGoogleApiClient;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        btnQLTK=findViewById(R.id.btnQuanLyTaiKhoan);
        Intent intent=getIntent();
        loaitk= intent.getStringExtra("loaitk");
        this.imageView=(ImageView)this.findViewById(R.id.imgDangNhap);
        mPreferencesGoogle= getSharedPreferences("nguoichoi_google",MODE_PRIVATE);
        mPreferencesTKnguoichoi=getSharedPreferences("nguoichoi",MODE_PRIVATE);

        if(loaitk.equals("1")){
            Picasso.with(this).load(mPreferencesGoogle.getString("hinh_dai_dien","")).into(imageView);
            btnQLTK.setEnabled(false);
            btnQLTK.setBackgroundColor(getResources().getColor(R.color.colorXam));
            btnQLTK.setPaintFlags(btnQLTK.getPaintFlags() | Paint.STRIKE_THRU_TEXT_FLAG);

        }
        if (loaitk.equals("0")){

            hinh_dai_dien= mPreferencesTKnguoichoi.getString("hinh_dai_dien","");
            String url = "http://10.0.2.2:8000/assets/images/users/"+hinh_dai_dien;
            Picasso.with(this).load(url).into(imageView);
        }








        btnDangXuat= findViewById(R.id.btnDangXuat);

    }
    public void dangXuat(View view)
    {


        Intent intent= new Intent(this,DangNhapActivity.class);
        startActivity(intent);
    }
    public void TroChoiMoi(View view) {
        Intent intent= new Intent(this, ChonLinhVucActivity.class);
        startActivity(intent);
    }

    public void DangNhap(View view) {
        Intent intent= new Intent(this,DangNhapActivity.class);
        startActivity(intent);
    }
    public void QLTaiKhoan(View view) {
        Intent intent = new Intent(MainActivity.this,QLTaiKhoanActivity.class);
        intent.putExtra("loaitk",loaitk);
        startActivity(intent);
    }
    public void BangXepHang(View view){
        Intent intent=new Intent(MainActivity.this,BangXepHang_form.class);
        startActivity(intent);
    }
    public void MuaThemCredit(View view){
        Intent intent=new Intent(MainActivity.this,Credit_form.class);
        startActivity(intent);
    }
}
