package com.example.do_angame;

import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.drawable.BitmapDrawable;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.text.InputType;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.squareup.picasso.Picasso;

import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

public class QLTaiKhoanActivity extends AppCompatActivity {
    final int PICK_IMAGE_REQUEST = 1;
    private Uri filePath;
    private Bitmap bitmap;
    private static String hinhanh;
    private String id;
    private String ten_dang_nhap;
    private String mail;
    private String mat_khau;
    private EditText edit_tendangnhap;
    private EditText edit_email;
    private EditText edit_matkhau;
    private EditText edit_xacnhanmatkhau;
    private String  hinh_dai_dien;
    private String  diem_cao_nhat;
    private String  credit;
    private ImageView imgavartar;
    private String duongdan;
    SharedPreferences sharedPreferences;
    SharedPreferences sharedPreferencesFB;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_qltai_khoan);
        edit_tendangnhap=findViewById(R.id.edtTendangnhapqm);
        edit_email=findViewById(R.id.edtEmailqm);
        edit_matkhau=findViewById(R.id.edtdoimatkhau);
        edit_xacnhanmatkhau=findViewById(R.id.edtXacnhanMK);
        imgavartar=findViewById(R.id.imghinhdaidienql);

        //load thong tin nguoi choi vao edit text
        sharedPreferences=getSharedPreferences("nguoichoi",MODE_PRIVATE);
        edit_tendangnhap.setText(sharedPreferences.getString("ten_dang_nhap",""));
        ten_dang_nhap=edit_tendangnhap.getText().toString();
        edit_email.setText(sharedPreferences.getString("mail",""));

        id = sharedPreferences.getString("id_nguoichoi","");
        hinh_dai_dien = sharedPreferences.getString("hinh_dai_dien","");
        diem_cao_nhat = sharedPreferences.getString("diem_cao_nhat","");
        credit = sharedPreferences.getString("credit","");
        Log.d("hinhdaidien",hinh_dai_dien);

        //load hinh dai dien
            String url = "http://10.0.2.2:8000/assets/images/users/"+hinh_dai_dien;
            Picasso.with(this).load(url).into(imgavartar);

        //khong cho sua ten dang nhap
        edit_tendangnhap.setEnabled(false);
        edit_tendangnhap.setInputType(InputType.TYPE_NULL);
        edit_tendangnhap.setFocusable(false);

    }
    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if(requestCode == PICK_IMAGE_REQUEST && resultCode == RESULT_OK
                && data != null && data.getData() != null) {
            // Lay Uri den file duoc chon
            filePath = data.getData();


            try {
                // Lay hinh anh Bitmap tu Uri
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);

                hinhanh=NetworkUtils.encodeBitmapToString(bitmap);

                // Hien thi hinh anh len ImageView
                imgavartar.setImageBitmap(bitmap);


            } catch (IOException e) {
                e.printStackTrace();
            }

        }
    }
    public void chonanh(View view) {
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);

        startActivityForResult(Intent.createChooser(intent, "Select image"),
                PICK_IMAGE_REQUEST);
    }
    public void CapNhatThongTin(View view){

        try {
            if(edit_email.getText().toString().equals("")||edit_matkhau.getText().toString().equals("")|edit_xacnhanmatkhau.getText().toString().equals(""))
            {
                Toast.makeText(this, "Thiếu yêu cầu", Toast.LENGTH_SHORT).show();
            }
            else
            {
                mail=edit_email.getText().toString();
                mat_khau=edit_matkhau.getText().toString();

                duongdan = "http://10.0.2.2:8000/api/nguoi-choi/chinhsua-nguoichoi/"+id;
                if(hinhanh==null){
                    bitmap = ((BitmapDrawable) imgavartar.getDrawable()).getBitmap();
                    hinhanh=NetworkUtils.encodeBitmapToString(bitmap);
                }
                Map<String,String> map= new HashMap<>();
                map.put("ten_dang_nhap",ten_dang_nhap);
                map.put("mat_khau",mat_khau);
                map.put("mail",mail);
                map.put("hinh_dai_dien", hinhanh);
                map.put("diem_cao_nhat", diem_cao_nhat);
                map.put("credit",credit);


                NetworkUtils.PostAPI(QLTaiKhoanActivity.this,map,duongdan);

            }



       }catch (Exception e){
           Toast.makeText(this, "Cập nhật thất bại", Toast.LENGTH_SHORT).show();
       }



    }
}
