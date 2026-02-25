package com.agrofinanzas.mobile

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import com.agrofinanzas.mobile.ui.navigation.AgroFinanzasNavHost
import com.agrofinanzas.mobile.ui.theme.AgroFinanzasTheme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            AgroFinanzasTheme {
                AgroFinanzasNavHost()
            }
        }
    }
}
