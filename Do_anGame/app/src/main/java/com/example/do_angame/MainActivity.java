package com.example.do_angame;
import android.content.Intent;
import android.view.View;
import android.widget.ImageView;
import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;
public class MainActivity extends AppCompatActivity {

    private ImageView imageView;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        this.imageView=(ImageView)this.findViewById(R.id.imgDangNhap);

    }

    public void TroChoiMoi(View view) {
        Intent intent= new Intent(this, ChonLinhVucActivity.class);
        startActivity(intent);
    }

    public void DangNhap(View view) {
        Intent intent= new Intent(this,DangNhapActivity.class);
        startActivity(intent);
    }
}
