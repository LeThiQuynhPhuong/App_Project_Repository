package com.example.do_angame;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class ChonLinhVucActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chon_linh_vuc);
    }

    public void ChoiGame(View view) {
        Intent intent= new Intent(this,CauHoiActivity.class);
        startActivity(intent);
    }
}
