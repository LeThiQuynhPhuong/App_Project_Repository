package com.example.do_angame;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.security.NoSuchAlgorithmException;
import java.util.ArrayList;

public class GetAPINguoiChoi extends AsyncTask<String,String,String> {
    private Context context;
    String ten_dap_nhap;
    String mat_khau;
    SharedPreferences sharedPreferences;
    SharedPreferences.Editor editor;
    ArrayList<NguoiChoi> nguoiChois;

    public GetAPINguoiChoi(Context context, String ten_dap_nhap, String mat_khau) throws NoSuchAlgorithmException {
        nguoiChois = new ArrayList<>();
        this.ten_dap_nhap = ten_dap_nhap;
        this.mat_khau =NetworkUtils.convertHashToStringMD5(mat_khau);
        this.context = context;
    }

    @Override
    protected String doInBackground(String... strings) {
        return NetworkUtils.GetAPIJSON(strings[0]);
    }

    @Override
    protected void onPostExecute(String s) {
        super.onPostExecute(s);
        try {
            JSONObject jsonnguoichoi = new JSONObject(s);
            JSONArray jsonarraydata = jsonnguoichoi.getJSONArray("data");

            for (int i = 0; i < jsonarraydata.length(); i++) {
                NguoiChoi nguoiChoi = new NguoiChoi();
                JSONObject jsonObject = jsonarraydata.getJSONObject(i);
                String id = String.valueOf(jsonObject.getInt("id"));
                String ten_dang_nhap = jsonObject.getString("ten_dang_nhap");
                String mat_khau = jsonObject.getString("mat_khau");
                String email = jsonObject.getString("mail");
                String hinh_dai_dien = jsonObject.getString("hinh_dai_dien");
                String diem_cao_nhat = String.valueOf(jsonObject.getInt("diem_cao_nhat"));
                String credit = String.valueOf(jsonObject.getInt("credit"));


                nguoiChoi.setId(id);
                nguoiChoi.setTen_dang_nhap(ten_dang_nhap);
                nguoiChoi.setMat_khau(mat_khau);
                nguoiChoi.setEmail(email);
                nguoiChoi.setCredit(credit);
                nguoiChoi.setDiem_cao_nhat(diem_cao_nhat);
                nguoiChoi.setHinh_dai_dien(hinh_dai_dien);
                nguoiChois.add(nguoiChoi);
            }
            for (int i = 0; i < nguoiChois.size(); i++) {

                if (ten_dap_nhap.equals(nguoiChois.get(i).ten_dang_nhap) && mat_khau.equals(nguoiChois.get(i).mat_khau)) {
                    sharedPreferences = context.getSharedPreferences("nguoichoi", context.MODE_PRIVATE);
                    editor = sharedPreferences.edit();
                    editor.putString("id_nguoichoi", nguoiChois.get(i).id);
                    editor.putString("ten_dang_nhap", nguoiChois.get(i).ten_dang_nhap);
                    editor.putString("credit", nguoiChois.get(i).credit);
                    editor.putString("email", nguoiChois.get(i).email);
                    editor.putString("diem_cao_nhat", nguoiChois.get(i).diem_cao_nhat);
                    editor.putString("hinh_dai_dien", nguoiChois.get(i).hinh_dai_dien);
                    editor.commit();

                    Intent intent = new Intent(context, MainActivity.class);
                    intent.putExtra("loaitk","0");
                    Activity activity= (Activity) context;
                    activity.startActivity(intent);

                }
            }

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
}