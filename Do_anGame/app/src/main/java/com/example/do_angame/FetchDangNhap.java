package com.example.do_angame;

import android.os.AsyncTask;

import java.util.HashMap;

public class FetchDangNhap extends AsyncTask<String, Void, String> {
    @Override
    protected String doInBackground(String... strings) {
       String uri = strings[0];
        String method = strings[1];

        String soDienThoai =strings[2];
        String matKhau=strings[3];

       HashMap<String,String> params=new HashMap<>();
      params.put("ten_dang_nhap",soDienThoai);
      params.put("mat_khau", matKhau);

        return NetworkUtils.postRequest(uri,params);
    }
}
