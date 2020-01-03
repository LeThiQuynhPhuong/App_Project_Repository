package com.example.do_angame;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import java.security.NoSuchAlgorithmException;

public class DangKyActivity extends AppCompatActivity {
    private String path="http://localhost:8000/api/";
    private String BASE_URL="http://10.0.2.2:8000/api/nguoi-choi/them-nguoi-choi";
    private EditText edit_tendangnhap;
    private EditText edit_email;
    private EditText edit_matkhau;
    private EditText edit_xacnhanmatkhau;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dang_ky);
        edit_tendangnhap = findViewById(R.id.edit_TenDangNhap);
        edit_email=findViewById(R.id.edit_Email);
        edit_matkhau=findViewById(R.id.edit_MatKhau);
        edit_xacnhanmatkhau=findViewById(R.id.edit_NhapLaiMatKhau);
    }

    public void DangKyItem(View view) throws NoSuchAlgorithmException {
        String matKhau = edit_matkhau.getText().toString();
        String xacNhanMatKhau = edit_xacnhanmatkhau.getText().toString();
        Bitmap hinhdaidien_macdinh = BitmapFactory.decodeResource(getResources(), R.drawable.hinhdaidien);
        if(matKhau.equals(xacNhanMatKhau)){
            PostAPIDangKy postAPIDangKy = (PostAPIDangKy) new PostAPIDangKy(DangKyActivity.this, BASE_URL,edit_tendangnhap,edit_email,edit_matkhau,hinhdaidien_macdinh).execute();
        }
        else {
            Toast.makeText(this, "Mat khau chua trung nhau", Toast.LENGTH_SHORT).show();
        }
    }
}
