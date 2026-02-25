package com.agrofinanzas.mobile.ui.screens.dashboard

import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.Button
import androidx.compose.material3.Card
import androidx.compose.material3.CircularProgressIndicator
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.collectAsState
import androidx.compose.runtime.getValue
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import androidx.lifecycle.viewmodel.compose.viewModel
import com.agrofinanzas.mobile.ui.viewmodel.DashboardViewModel

@Composable
fun DashboardScreen(
    viewModel: DashboardViewModel = viewModel()
) {
    val uiState by viewModel.uiState.collectAsState()

    LaunchedEffect(Unit) {
        viewModel.loadDashboard()
    }

    Column(
        modifier = Modifier
            .fillMaxSize()
            .padding(20.dp),
        verticalArrangement = Arrangement.spacedBy(12.dp)
    ) {
        Text("Dashboard Agro", style = MaterialTheme.typography.headlineSmall)

        Button(
            onClick = viewModel::loadDashboard,
            modifier = Modifier.fillMaxWidth()
        ) {
            Text("Recargar")
        }

        if (uiState.loading) {
            CircularProgressIndicator()
        }

        uiState.error?.let {
            Text(text = it, color = MaterialTheme.colorScheme.error)
        }

        Text("Productos disponibles", style = MaterialTheme.typography.titleMedium)
        LazyColumn(verticalArrangement = Arrangement.spacedBy(8.dp)) {
            items(uiState.products) { product ->
                Card(modifier = Modifier.fillMaxWidth()) {
                    Text(product, modifier = Modifier.padding(12.dp))
                }
            }
        }

        if (uiState.summary.isNotEmpty()) {
            Text("Resumen", style = MaterialTheme.typography.titleMedium)
            Text(uiState.summary.toString())
        }
    }
}
