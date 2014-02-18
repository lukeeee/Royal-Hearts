package se.group1.royalhearts;

import android.content.Context;
import android.media.MediaPlayer;
import android.os.Vibrator;
import android.util.Log;

/**
 * Created by Lukas on 2014-02-07.
 */
public class SoundHelper {


    public static void start(int source, Context context){
            try{
                MediaPlayer mp = MediaPlayer.create(context, source);
                mp.start();
            } catch (Exception e){
                Log.i("MPerror", "" + e);
            }
    }
    public static void vibrate(Context context){
            Vibrator vib = (Vibrator) context.getSystemService(Context.VIBRATOR_SERVICE);
            vib.vibrate(100);
        }

}