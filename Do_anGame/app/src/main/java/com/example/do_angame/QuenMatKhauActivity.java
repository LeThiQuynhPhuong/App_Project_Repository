package com.example.do_angame;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class QuenMatKhauActivity extends AppCompatActivity {

    private EditText edit_mail;
    private EditText edit_tendangnhap,edit_mk,edit_xnmk;
    private TextView txt_thongtin;
    private String tendangnhap,mail,mk,load_hinh_dai_dien;
    private Button btnLay;
    private ImageView avartar;
    SharedPreferences sharedPreferences;
    SharedPreferences.Editor editor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_quen_mat_khau);
        btnLay=findViewById(R.id.btnLAYMK);
        edit_mail=findViewById(R.id.edtEmailquenmk);
        edit_tendangnhap=findViewById(R.id.edtTendangnhapquenmk);
        edit_mk=findViewById(R.id.edt_dmk);
        edit_xnmk=findViewById(R.id.edt_xndmk);
        edit_mk.setVisibility(View.INVISIBLE);
        edit_xnmk.setVisibility(View.INVISIBLE);
        txt_thongtin=findViewById(R.id.txtdoianh);
        avartar=findViewById(R.id.imghinhdaidienql);
        btnLay.setText("Gửi yêu cầu");
        sharedPreferences=getSharedPreferences("id_nguoichoi",MODE_PRIVATE);





    }
    public void XacNhanYC(View view){

        if(view.getId()==R.id.btnLAYMK){
            if(btnLay.getText().equals("Gửi yêu cầu")){
                tendangnhap=edit_tendangnhap.getText().toString();
                mail= edit_mail.getText().toString();
                String duongdan1="http://10.0.2.2:8000/api/nguoi-choi";
                GetAPITatCaNguoiChoi getAPITatCaNguoiChoi= (GetAPITatCaNguoiChoi) new GetAPITatCaNguoiChoi(QuenMatKhauActivity.this,tendangnhap,mail).execute(duongdan1);
            }
            else {

                tendangnhap=edit_tendangnhap.getText().toString();
                mail= edit_mail.getText().toString();
                mk=edit_mk.getText().toString();
                String idnguoichoi=sharedPreferences.getString("id","");
                String duongdan = "http://10.0.2.2:8000/api/nguoi-choi/cap_nhat_doimk/"+idnguoichoi;
                Map<String,String>map=new HashMap<>();
                map.put("mat_khau",mk);
                NetworkUtils.PostAPI(QuenMatKhauActivity.this,map,duongdan);
            }


        }
    }


    public class GetAPITatCaNguoiChoi extends AsyncTask<String,String,String> {
        private Context context;
        String ten_dap_nhap;
        String mail;
        ArrayList<NguoiChoi> nguoiChois;

        public GetAPITatCaNguoiChoi (Context context, String ten_dap_nhap, String mail) {
            nguoiChois = new ArrayList<>();
            this.ten_dap_nhap = ten_dap_nhap;
            this.mail = mail;
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
                    if (ten_dap_nhap.equals(nguoiChois.get(i).ten_dang_nhap) && mail.equals(nguoiChois.get(i).getEmail())) {
                        edit_mk.setVisibility(View.VISIBLE);
                        edit_xnmk.setVisibility(View.VISIBLE);
                        edit_mail.setVisibility(View.INVISIBLE);
                        edit_tendangnhap.setVisibility(View.INVISIBLE);
                        btnLay.setText("Xác nhận");
                        txt_thongtin.setText("Nhập mật khẩu mới");
                        load_hinh_dai_dien=nguoiChois.get(i).getHinh_dai_dien();
                        String url = "http://10.0.2.2:8000/assets/images/users/"+load_hinh_dai_dien;
                        Picasso.with(context).load(url).into(avartar);
                        editor=sharedPreferences.edit();
                        editor.putString("id",nguoiChois.get(i).getId());
                        editor.commit();

                    }
                }

            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    }

}
