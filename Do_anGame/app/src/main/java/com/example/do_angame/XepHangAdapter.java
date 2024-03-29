package com.example.do_angame;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class XepHangAdapter extends  RecyclerView.Adapter<XepHangAdapter.ViewHoler> {

    private final ArrayList<XepHang> xepHangs;
    private Context context;
    private String url;

    public XepHangAdapter(ArrayList<XepHang> xepHangs, Context context) {
        this.xepHangs = xepHangs;
        this.context = context;
    }

    @Override
    public ViewHoler onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        return new ViewHoler(LayoutInflater.from(context).inflate(R.layout.list_item_xephang, parent, false));
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHoler holder, int position) {
        XepHang xepHang = xepHangs.get(position);
        holder.BindTo(xepHang);
    }

    @Override
    public int getItemCount() {
        return xepHangs.size();
    }

    public class ViewHoler extends RecyclerView.ViewHolder{

        private TextView ten_dang_nhap;
        private TextView diem_cao_nhat;
        private ImageView hinh_dai_dien;

        public ViewHoler(@NonNull View itemView) {
            super(itemView);
            this.ten_dang_nhap = itemView.findViewById(R.id.txttendangnhapxh);
            this.diem_cao_nhat = itemView.findViewById(R.id.txtdiemxh);
            this.hinh_dai_dien=itemView.findViewById(R.id.imgxephang);
        }
        void BindTo(XepHang currentLinhvuc){
            ten_dang_nhap.setText(currentLinhvuc.getTen_dang_nhap());
            diem_cao_nhat.setText(currentLinhvuc.getDiem_cao_nhat());
            url = "http://localhost:8000/assets/images/users/"+currentLinhvuc.getHinh_dai_dien();
            Picasso.with(context).load(url).into(hinh_dai_dien);
        }
    }
}
